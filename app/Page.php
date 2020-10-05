<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{	
	use SoftDeletes;
	
    protected $fillable = [
    	'title', 'slug', 'preview', 'content', 'status', 'view', 'user_id',
    ];
}
