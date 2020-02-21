<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    //
    protected $table = "category_task";
    protected $fillable = [
        'category_id',
        'task_id',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
    
}
