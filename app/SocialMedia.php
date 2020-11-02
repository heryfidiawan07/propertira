<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialMedia extends Model
{	
	use SoftDeletes;

    protected $table = 'social_media';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'url', 'class', 'color',
    ];

}
