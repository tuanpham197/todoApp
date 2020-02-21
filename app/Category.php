<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "category";
    protected $fillable = [
        'name',
        'slug',
        'user_id'
    ];
    public function user()
    {
        return $this->hasOne('App\User','id', 'user_id');
    }
    public function task()
    {
        return $this->belongsToMany('App\Task');
    }
}
