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
        $cate = new CategoryServices();
        $task = new TaskServices();
        $ob = new UserServices();
        $arrCategory = $cate->findCategory($ob->getIdUser());
        $arrTask     = $task->findTaskByUser($ob->getIdUser());
        $taskLastest = $task->getTaskLatest($ob->getIdUser());
        View::share(['arrCategory' => $arrCategory, 'arrTask' => $arrTask,'task'=>$taskLastest]);
    
        
    }
}
