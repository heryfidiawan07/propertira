<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{   
    use SoftDeletes;
    
    protected $fillable = [
    	'title', 'slug', 'text_preview', 'address', 'content', 'view', 'user_id',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    
    public function categories(){
    	return $this->belongsToMany(Category::class);
    }
    
    public function media(){
    	return $this->morphMany(Media::class, 'mediatable');
    }
    
}
