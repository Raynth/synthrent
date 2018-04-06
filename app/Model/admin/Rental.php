<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Model\admin\Customer');
    }

    public function product()
    {
        return $this->belongsTo('App\Model\admin\Product');
    }
}
