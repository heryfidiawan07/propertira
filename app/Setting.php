<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'author', 'name', 'title', 'description', 'phone', 'hp', 'whatsapp', 'company', 'address',
    ];
}
