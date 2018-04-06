<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function products()
    {
        return $this->hasMany('App\Model\admin\Product');
    }
}
