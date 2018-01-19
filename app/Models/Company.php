<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'id', 
        'name', 
        'description', 
        'user_id'
    ];

    public function projects() {
        return $this->hasMany('App\Models\Project');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
