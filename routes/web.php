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

Route::get('/user', function () {
    dd(App\User::all());
});
Route::get('/login','UserController@getLoginUser')->name('getlogin');
Route::post('/login','UserController@checkLoginUser')->name('postlogin');
Route::get('/register','UserController@getRegister')->name('getRegister');
Route::post('/register','UserController@postRegister')->name('postRegister');

Route::group(['prefix' => 'user','middeware'=>'checklogin'], function () {
    Route::resource('/task','TaskController');
    Route::group(['prefix' => 'category'], function () {
        Route::get('/{id}','CategoryController@getTaskByCategory');
        Route::post('/add','CategoryController@addCategory')->name('addCategory');
    });
    
});