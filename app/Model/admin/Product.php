<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Model\admin\Category');
    }

    public function product_mark()
    {
        return $this->belongsTo('App\Model\admin\ProductMark');
    }

    public function rentals()
    {
        return $this->hasMany('App\Model\admin\Rental');
    }

    // Controleer of het geselecteerde product voor de gekozen periode beschikbaar is
    public function isProductRented( $product_id, $date_from, $date_to )
    {
        $product_available = DB::table('rentals')
                        ->whereRaw("
                            NOT(
                                date_to < '{$date_from}' OR
                                date_from > '{$date_to}'
                                )
                        ")
                        ->where('product_id', $product_id)
                        ->get()
        ;
        return $product_available;
    }
}
