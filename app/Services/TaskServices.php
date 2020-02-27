<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
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
    public function addCategory($category,$token)
    {
        $arr = explode(',',$category);
        $arrCate = array();
        $arrNew  = array();
        
        foreach ($arr as $key => $value) {
            $cate = Category::where('name','LIKE',"%$value%")->first();
            if(!empty($cate)){
                array_push($arrCate,$cate->id);
            }
           else{
                array_push($arrNew,$value);//str_slug($value,'-')
           }
        }
        foreach ($arrNew as $key => $value) {
            $ar = array();
            $ar["_token"] = $token;
            $ar["name"]   = $value;
            $ar["slug"]   = str_slug($value,'-');
            $ar["user_id"]= Auth::user()->id;
            $cate = Category::create($ar);
            array_push($arrCate,$cate->id);
        }
        return $arrCate;
    }
    public function addTaskAndCategory($arrCategory,$task)
    {
        foreach ($arrCategory as $key => $value) {    
            $cat = new TaskCategory([
                "category_id" => $value,
                "task_id"     => $task
            ]);
            $cat->save();
        }
    }
    public function addTask($request)
    {
        $input = $request->all();
        $cate = $input['tag-2'];
        unset($input['tag-2']);
        $input['user_id'] = Auth::user()->id;
        $task = Task::create($input);

        if(!empty($cate)){
            $arrCate = $this->addCategory($cate,$input["_token"]);
            $this->addTaskAndCategory($arrCate,$task->id);
        }
        return $task;
    }
}