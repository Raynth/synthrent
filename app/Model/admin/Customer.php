<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function rentals()
    {
        return $this->hasMany('App\Model\admin\Rental');
    }
}
