<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function rentals()
    {
        return $this->hasMany('App\Model\admin\Rental');
    }
}
