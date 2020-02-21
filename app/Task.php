<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $table = "task";
    protected $fillable = [
        'title',
        'content',
        'clip'
    ];

   
    public function category()
    {
        return $this->belongsToMany('App\Category');
    }

    public function categoryTask()
    {
        return $this->hasMany('App\TaskCategory');
    }
}
