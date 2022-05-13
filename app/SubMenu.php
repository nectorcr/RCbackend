<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;

class Submenu extends Model
{
    // Relacion con modelo Menu
    public function menus()
    {
        return $this->belongsToMany('App\Menu');
    }
}