<?php
namespace App\Services;

use App\Task;
use App\TaskCategory;
use App\Category;
use Illuminate\Support\Facades\Auth;

class CategoryServices
{
    public function findCategory($user_id)
    {
        $arrCategory = Category::withCount('task')->where('user_id',$user_id)->get();
        return $arrCategory;
    }
    public function addCategory($request)
    {
        $input = $request->all();
        $input["user_id"] = Auth::user()->id;
        return Category::create($input);
    }
    public function findCategoryByName($name)
    {
        $arrCategory = Category::where('name', 'LIKE', "%$name%")->get();
        return $arrCategory;
    }
}