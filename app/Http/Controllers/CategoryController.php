<?php

namespace App\Http\Controllers;

use App\Services\TaskServices;
use App\Services\CategoryServices;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function __construct(TaskServices $taskServices,CategoryServices $categoryServices) {
        $this->taskServices     = $taskServices;
        $this->categoryServices = $categoryServices;
    }
    public function getTaskByCategory($category_id)
    {
        $arrTask = $this->taskServices->getTaskByCategory($category_id);
        return view('pages.index',\compact('arrTask'));
    }
    public function addCategory(CategoryRequest $request)
    {
        $category = $this->categoryServices->addCategory($request);
        return redirect('/');
    }
    public function findCategoryByName(Request $request)
    {
        $key = $request->key;
        $arrCate = $this->categoryServices->findCategoryByName($key);
        return $arrCate;
    }
    public function getAllCategoryUser()
    {
        $arrListCategory = $this->categoryServices->getAllCategoryUser(Auth::user()->id);
        return view('pages.category',compact('arrListCategory'));
    }
    public function deleteCategory($id)
    {
        $result = $this->categoryServices->deleteCategory($id);
        if($result == true)
        {
            return redirect('/user/category/get/all');
        }
    }
    public function updateCategory($id,Request $request)
    {
        return $this->categoryServices->updateCategory($id,$request);
    }
}
