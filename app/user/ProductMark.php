<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public function products()
    {
        return $this->hasMany('App\Model\user\Product');
    }
}
