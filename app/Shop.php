<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'shop_name', 
        'city_name', 
        'postal_code', 
        'street', 
        'lat', 
        'lng', 
        'email', 
        'telephone'
    ];

    public function shopCounter() {
        return $this->count();
    }

    public function togglePublished() {
        $this->published = !$this->published;

        return $this;
    }
}
