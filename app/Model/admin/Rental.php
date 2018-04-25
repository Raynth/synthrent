<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Model\admin\User');
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
        return Product::select('products.id', 'product_mark_id', 'product_name', 'rent_money')
            ->join('product_marks', 'product_marks.id', '=', 'products.product_mark_id')
            ->orderBy('product_mark_name', 'asc')
            ->orderBy('product_name', 'asc')
            ->get();
    }
}
