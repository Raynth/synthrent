<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class ProductMark extends Model
{
    public function products()
    {
        return $this->hasMany('App\Model\admin\Product');
    }

    public function rentals()
    {
        return $this->hasMany('App\Model\admin\Rental');
    }
}
