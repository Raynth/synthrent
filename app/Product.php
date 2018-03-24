<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
