<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name', 'slug', 'icon', 'user_id',
    ];

    public function properties(){
    	return $this->belongsToMany(Property::class);
    }
}
