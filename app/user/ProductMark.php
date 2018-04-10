<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class ProductMark extends Model
{
    public function products()
    {
        return $this->hasMany('App\Model\user\Product');
    }
}
