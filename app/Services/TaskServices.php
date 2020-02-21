<?php
namespace App\Services;

use App\Task;
use App\TaskCategory;
use App\Category;

class TaskServices
{
    public function getDetailTask($id)
    {
        return Task::with('category')->where('id',$id)->first();
    }
    public function getTaskLatest($user_id)
    {
        $task = Task::whereHas('category',function($query) use ($user_id){
            $query->where("user_id",'=',$user_id);
        })->with('category')->orderBy('created_at','desc')->first();
        return $task;
    }
    public function findTaskByUser($user_id)
    {
        $arr = Task::whereHas('category',function($query) use ($user_id){
            $query->where("user_id",'=',$user_id);
        })->with('category')->get();     
        return $arr;
    }
    public function getTaskByCategory($id)
    {
        $arr = Task::whereHas('categoryTask',function($query) use ($id){
            $query->where('category_id',$id);
        })->with('category')->get();
        return $arr;
    }
}