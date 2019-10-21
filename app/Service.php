<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title', 'alias', 'short_text', 'img', 'description', 'created_at'];
}
