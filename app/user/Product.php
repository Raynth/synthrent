<?php

namespace App\user;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function merk()
    {
        return $this->belongsTo('App\Model\user\Mark');
    }
}
