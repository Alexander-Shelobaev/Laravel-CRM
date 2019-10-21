<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

	protected $fillable = ['name','code'];

    public function roles(){
    	return $this->belongsToMany('Role','permission_role');
    }

    
}
