<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function properties() {
        return $this->hasMany(Property::class);
    }

    public function blogs() {
        return $this->hasMany(Blog::class);
    }

    public function pages() {
        return $this->hasMany(Page::class);
    }

    public function promos() {
        return $this->hasMany(Promo::class);
    }

    public function areas() {
        return $this->hasMany(Area::class);
    }

    public function categories() {
        return $this->hasMany(Category::class);
    }
    
}
