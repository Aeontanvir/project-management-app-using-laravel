<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'days', 
        'company_id', 
        'user_id'
    ];

    // has some query
    public function tasks() {
        return $this->hasMany('App\Models\Task');
    }

    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
    
}
