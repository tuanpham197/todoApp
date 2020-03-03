<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\TaskServices;
use App\Services\CategoryServices;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function __construct(TaskServices $taskServices,CategoryServices $categoryServices) {
        $this->taskServices = $taskServices;
        $this->categoryServices = $categoryServices;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        //
        $task = $this->taskServices->addTask($request);
        if(!empty($task)){
            $message     = "Create is successfully";
            return view('pages.add',compact(['message']));
        }
        else{
            $message = "Create is  fails";
            return view('pages.add',compact('message'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        $task = $this->taskServices->getDetailTask($id);
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return $this->taskServices->updateTask($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAddTask()
    {
        return view('pages.add');
    }

    public function addTask(TaskRequest $request)
    {
        $task = $this->taskServices->addTask($request);
        if(!empty($task)){
            $arrTask = $this->taskServices->findTaskByUser(Auth::user()->id);
            $message = "Create is successfully";
            return view('pages.add',compact(['arrTask','message']));
        }
        else{
            $message = "Create is  fails";
            return view('pages.add',compact('message'));
        }
    }
    public function getUpdate($id)
    {
        $task = $this->taskServices->getDetailTask($id);
        $str = "";
        $len = count($task->category);
        $i=0;
        if($len >0){
            foreach($task->category as $item){

                if($i<$len-1)
                    $str = $str.$item->name.",";
                else
                    $str = $str.$item->name;
    
                $i++;
            }
        }
        return view('pages.update',compact(['task','str']));
    }
    public function updateClip(Request $request)
    {
        return $this->taskServices->updateClip($request);
    }
    public function deleteTask($id)
    {
        if($this->taskServices->deleteTask($id) == true)
            return  redirect('/');
        else{
            $message = "Delete is fail, you must unenable clip before delete task.";
            return view('pages.index',compact('message'));
        }    
    }
    public function getTaskIsDeleted()
    {
        $arrTask = $this->taskServices->getTaskIsDelete(Auth::user()->id);
        return view('pages.task-delete',compact('arrTask'));
    }
    public function searchTask(Request $request)
    {
        return $this->taskServices->searchTask($request->key,Auth::user()->id);
    }
}
