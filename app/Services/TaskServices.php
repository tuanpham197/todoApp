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
        })->with('category')->where('public',1)->orderBy('created_at','desc')->first();
        return $task;
    }
    public function findTaskByUser($user_id)
    {
        $arr = Task::whereHas('category',function($query) use ($user_id){
            $query->where("user_id",'=',$user_id);
        })->with('category')->where('public',1)->get();     
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
    public function deleteTaskAndCate($id)
    {
        $deletedRows = TaskCategory::where('task_id', $id)->delete();
        return $deletedRows;
    }
    public function updateTask($request,$id)
    {
        $input = $request->only(['title', 'content','tag-2','_token']);
        $task = Task::findOrFail($id);
        $task->title = $input['title'];
        $task->content = $input['content'];
        $task->save();
        $this->deleteTaskAndCate($id);
        if(!empty($input['tag-2'])){
            $arrCate = $this->addCategory($input['tag-2'],$input["_token"]);
            $this->addTaskAndCategory($arrCate,$id);
        }
        return $task;
    }
    public function updateClip($request)
    {
        $task = Task::findOrFail($request->key);
        if($task->clip == 0){
            $task->clip = 1;
        }else{
            $task->clip = 0;
        }
        $task->save();
        return $task;
    }
    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        if($task->clip == 1)
            return false;
        $task->public = 0;
        return $task->save();
    }
    public function getTaskIsDelete($user_id)
    {
        
        $arrTask = Task::where([
            ['public','=',0],
            ['user_id','=',$user_id]
        ])->get(); 
        return $arrTask;
    }
    public function searchTask($key,$user_id)
    {
        return Task::where([
            ['title', 'LIKE', "%$key%"],
            ['user_id','=',$user_id],
            ['public','=',1]
        ])->with('category')->get();
    }
    public function deleteTaskInTrash($id)
    {
        $task = Task::findOrFail($id);
        return $task->delete();
    }
    public function restoreTask($id)
    {
        $task = Task::findOrFail($id);
        $task->public = 1;
        return $task->save();
    }
    public function getTaskClip($user_id)
    {
        $arrTask = Task::where([
            ['public','=',1],
            ['user_id','=',$user_id],
            ['clip' ,'=',1]
        ])->get(); 
        return $arrTask;
    }
}