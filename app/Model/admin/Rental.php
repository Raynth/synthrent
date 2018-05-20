<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    public function klant()
    {
        return $this->belongsTo('App\Model\admin\Customer');
    }

    public function product()
    {
        return $this->belongsTo('App\Model\admin\Product');
    }
    
    public function merk()
    {
        return $this->belongsTo('App\Model\admin\Mark');
    }

    public function create()
    {
        return Product::select('products.id', 'merk_id', 'naam', 'huurprijs')
            ->join('marks', 'marks.id', '=', 'products.merk_id')
            ->orderBy('naam', 'asc')
            ->orderBy('naam', 'asc')
            ->get();
    }

    public static function top5()
    {
        return Rental::selectRaw('product_id, SUM(dagen) as somdagen')
        ->groupBy('product_id')
        ->orderBy('somdagen', 'DESC')
        ->take(5)->get();
    }
}
