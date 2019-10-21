<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role'); //, 'role_user'
    }

    public function chatMessages(){
        return $this->hasMany('App\Chat', 'recipient_id'); //, ''
    }

    

    // public function hasPerm($perm_id) {
    // 	foreach ($this->roles as $role) {
    // 		foreach ($role->perms as $perm) {
    // 			if ($perm_id == $perm->id) {
    // 				return true;
    // 			}
    // 		}
    // 	}
    // }

    
}
