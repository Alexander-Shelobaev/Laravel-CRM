<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = ['name','code'];

    public function users(){
    	return $this->belongsToMany('User','role_user');
    }

    public function permissions(){
    	return $this->belongsToMany('App\Permission'); // ,'permission_role','role_id', 'permission_id'
    }
}
