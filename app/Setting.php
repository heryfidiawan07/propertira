<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'author', 'name', 'title', 'description', 'phone', 'hp', 'whatsapp', 'whatsapp_link', 'company', 'address', 'email',
    ];

    public function btnPhone($title) {
    	return $this->whatsapp_link != null 
    	? '<a href="tel:+62'.$this->hp.'" class="btn btn-primary btn-sm col ml-1 mr-1"><i class="fas fa-phone"></i>'
    	: false;
    }

    public function btnWhatsapp($title) {
    	return $this->whatsapp_link != null 
    	? '<a href="'.$this->whatsapp_link.$title.'" class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> Kirim Pesan</a>' 
    	: false;
    }
}
