<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'headline',
        'alias',
        'desc_announce',
        'picture_announce',
        'detailed_desc',
        'detailed_picture',
        'created_at'
    ];
}
