<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Model\admin\Category');
    }

    public function rentals()
    {
        return $this->hasMany('App\Model\admin\Rental');
    }
}
