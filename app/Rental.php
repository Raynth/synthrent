<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
