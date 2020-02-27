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
            $arrTask     = $this->taskServices->findTaskByUser(Auth::user()->id);
            //$arrCategory = $this->categoryServices->findCategory(Auth::user()->id);
            $message     = "Create is successfully";
            return view('pages.add',compact(['arrTask','message']));
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
}
