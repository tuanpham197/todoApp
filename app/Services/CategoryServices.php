<?php
namespace App\Services;

use App\Task;
use App\TaskCategory;
use App\Category;
use Illuminate\Http\Request;
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
    public function getAllCategoryUser($user_id)
    {
        return Category::where('user_id','=',$user_id)->get();
    }
    public function deleteCategory($id)
    {
        $cate = Category::findOrFail($id);
        return $cate->delete();
    }
    public function updateCategory($id,$request)
    {
        $name = $request->key[1]['value'];
        $cate = Category::where([
            ['name','=',$name],
            ['id','!=',$id]
        ])->get();
        if(count($cate) == 0){
            $cateNew = Category::findOrFail($id);
            $cateNew->name = $name;
            $cateNew->slug = $request->key[2]['value'];
            $cateNew->save();
            return $cateNew;
        }else{
            return "fail";
        }
    }
}