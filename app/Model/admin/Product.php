<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Model\admin\Category');
    }

    public function merk()
    {
        return $this->belongsTo('App\Model\admin\Mark');
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

    // Controleer of het geselecteerde product voor de gekozen periode beschikbaar is 
    public static function allProductRented( $id ) 
    { 
        $product_available = DB::table('rentals') 
                        ->where('product_id', $id)
                        ->whereDate('einddatum', '>', Carbon::now())
                        ->get() 
        ; 
        return $product_available; 
    }
}
