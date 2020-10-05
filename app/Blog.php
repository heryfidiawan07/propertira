<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{	
	use SoftDeletes;

    protected $fillable = [
    	'title', 'slug', 'image', 'preview', 'content', 'sticky', 'status', 'view', 'tags', 'user_id',
    ];
}
