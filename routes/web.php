<?php
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->middleware('checklogin');

// Route::get('/user', function () {
//     dd(App\User::all());
// });
Route::get('/login','UserController@getLoginUser')->name('getlogin');
Route::post('/login','UserController@checkLoginUser')->name('postlogin');
Route::get('/register','UserController@getRegister')->name('getRegister');
Route::post('/register','UserController@postRegister')->name('postRegister');

Route::group(['prefix' => 'user','middeware'=>'checklogin'], function () {
    Route::resource('/task','TaskController');
    Route::group(['prefix' => 'category'], function () {
        Route::get('/{id}','CategoryController@getTaskByCategory');
        Route::post('/add','CategoryController@addCategory')->name('addCategory');
        Route::post('/','CategoryController@findCategoryByName');
    });
    Route::get('ts',function(){
        dd("test");
    });
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/add','TaskController@getAddTask')->name('add.task');
        Route::post('/add','TaskController@addTask')->name('post.task');
        Route::get('/update/{id}','TaskController@getUpdate')->name('get.update');
        Route::post('/clip','TaskController@updateClip');
        Route::get('/delete/{id}','TaskController@deleteTask');
        Route::get('/get-task-is-delete','TaskController@getTaskIsDeleted');

        
    });
    
});
Route::get('/test',function(){
    return "Aaaa";
});