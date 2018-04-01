<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function rentals()
    {
        return $this->hasMany('App\Rental');
    }
}
