<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = [
    	'name', 'slug', 'icon', 'user_id',
    ];
}
