<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{	
	use SoftDeletes;
	
    protected $fillable = [
    	'title', 'slug', 'text_preview', 'content', 'view', 'user_id',
    ];
}
