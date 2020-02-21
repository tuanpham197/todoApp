<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\TaskServices;
use App\Services\CategoryServices;

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
        $arrCategory = $cate->findCategory(2,1);
        $arrTask     = $task->findTaskByUser(1);
        $taskLastest = $task->getTaskLatest(1);
        View::share(['arrCategory' => $arrCategory, 'arrTask' => $arrTask,'task'=>$taskLastest]);
    }
}
