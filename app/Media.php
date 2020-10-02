<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
    	'image',
    ];

    public function mediatable(){
    	return $this->morphTo();
    }
}
