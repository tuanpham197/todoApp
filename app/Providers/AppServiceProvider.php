<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\TaskServices;
use App\Services\CategoryServices;
use App\Services\UserServices;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 
        View::composer('*', function($view)
        {
            if (Auth::check()){
                $id = Auth::user()->id;
                $cate = new CategoryServices();
                $task = new TaskServices();
                $ob = new UserServices();
                $arrCategory = $cate->findCategory($id);
                $arrTask     = $task->findTaskByUser($id);
                $taskLastest = $task->getTaskLatest($id);
                View::share(['arrCategory' => $arrCategory, 'arrTask' => $arrTask,'task'=>$taskLastest]);
            }
        });
        
    
        
    }
}
