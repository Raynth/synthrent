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
    
    public function product_mark()
    {
        return $this->belongsTo('App\Model\admin\ProductMark');
    }

    public function create()
    {
        return Product::select('products.id', 'product_mark_id', 'naam', 'huurprijs')
            ->join('product_marks', 'product_marks.id', '=', 'products.product_mark_id')
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
