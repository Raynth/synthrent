<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function admins()
    {
        return $this->hasMany('App\Model\admin\Admin');
    }
}
