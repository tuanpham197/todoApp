<?php

namespace App\Http\Controllers;

use App\Services\TaskServices;
use App\Services\CategoryServices;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

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
        dd($category);
        return redirect('/');
    }
    public function findCategoryByName(Request $request)
    {
        $key = $request->key;
        $arrCate = $this->categoryServices->findCategoryByName($key);
        return $arrCate;
    }
}
