<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Menu extends Model
{
    // Relacion con modelo Rol
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}