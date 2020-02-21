<?php
namespace App\Services;

use App\Task;
use App\TaskCategory;
use App\Category;

class CategoryServices
{
    public function findCategory($id,$user_id)
    {
        $arrCategory = Category::withCount('task')->where('user_id',$user_id)->get();
        return $arrCategory;
    }
}