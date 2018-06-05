<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    public function klant()
    {
        return $this->belongsTo('App\Model\admin\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Model\admin\Product');
    }
    
    public function merk()
    {
        return $this->belongsTo('App\Model\admin\Mark');
    }

    public static function top5()
    {
        return Rental::selectRaw('product_id, SUM(dagen) as somdagen')
        ->groupBy('product_id')
        ->orderBy('somdagen', 'DESC')
        ->take(5)->get();
    }
}
