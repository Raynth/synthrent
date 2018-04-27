<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

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
    public static function allProductRented( $id ) 
    { 
        $product_available = DB::table('rentals') 
                        ->where('product_id', $id)
                        ->whereDate('einddatum', '>', Carbon::now())
                        ->get() 
        ; 
        return $product_available; 
    }

    // Controleer of het geselecteerde product voor de gekozen periode beschikbaar is 
    public static function isProductRented( $product_id, $begindatum, $einddatum ) 
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
}
