<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Share extends Model
{	
	use SoftDeletes;
	
    protected $table = 'share';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'url', 'class',
    ];
    
}
