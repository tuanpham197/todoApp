<?php

namespace App\Http\Controllers;

use App\Services\TaskServices;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct(TaskServices $taskServices) {
        $this->taskServices = $taskServices;
    }
    public function getTaskByCategory($category_id)
    {
        $arrTask = $this->taskServices->getTaskByCategory($category_id);
        return view('pages.detail',\compact('arrTask'));
    }
    
}
