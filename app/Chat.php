<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Chat extends Model
{
    protected $table = 'chat';
    protected $fillable = ['text', 'author_id', 'recipient_id'];

    public function author() {
		//return $this->hasOne('App\User');//  ,'author_id','id'
		return $this->belongsTo('App\User');//  ,'author_id','id'
	}

	public function recipient() {
		//return $this->hasOne('App\User');//  ,'author_id','id'
		return $this->belongsTo('App\User');//  ,'recipient_id','id'
	}
}
