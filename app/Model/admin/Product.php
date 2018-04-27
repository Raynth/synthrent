<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use DB;

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
    public static function isProductRentedStore( $product_id, $begindatum, $einddatum ) 
    { 
        $product_available = DB::table('rentals') 
                        ->whereRaw(" 
                            NOT( 
                                einddatum < '{$begindatum}' OR 
                                begindatum > '{$einddatum}' 
                                ) 
                        ") 
                        ->where('product_id', $product_id) 
                        ->get() 
        ; 
        return $product_available; 
    }

    // Controleer of het geselecteerde product voor de gekozen periode beschikbaar is 
    public static function isProductRentedUpdate( $rental_id, $product_id, $begindatum, $einddatum ) 
    { 
        $product_available = DB::table('rentals') 
                        ->whereRaw(" 
                            NOT( 
                                einddatum < '{$begindatum}' OR 
                                begindatum > '{$einddatum}' 
                                ) 
                        ") 
                        ->where('product_id', $product_id)
                        ->where('id', '<>', $rental_id)
                        ->get() 
        ; 
        return $product_available; 
    }
}
