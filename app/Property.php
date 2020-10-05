<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{   
    use SoftDeletes;
    
    protected $fillable = [
    	'title', 'slug', 'preview', 'address', 'price_text', 'price', 'update', 'content', 'event', 'sticky', 'status', 'view', 'user_id',
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function promos() {
        return $this->belongsToMany(Promo::class);
    }

    public function areas() {
        return $this->belongsToMany(Area::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
    
    public function medias() {
    	return $this->morphMany(Media::class, 'mediatable');
    }
    
}
