<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'first_name', 
        'middle_name', 
        'last_name', 
        'city', 
        'country', 
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Every user has many projects
    public function companies() {
        return $this->hasMany('App\Models\Company');
    }

    // A user belongs to a role
    public function role() {
        return $this->belongsTo('App\Models\Role');
    }

    // A user belongs to many task
    public function tasks() {
        return $this->belongsToMany('App\Models\Task');
    }
    
    // A user belongs to many project
    public function projects() {
        return $this->belongsToMany('App\Models\Project');
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
