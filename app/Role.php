<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMIN       = "Admin";
    const ROLE_EDITOR      = "Editor";
    const ROLE_USER        = "User";
    const ROLE_VEREADOR    = "Vereadir";



    public function users(){
        return $this->belongsToMany(User::class);
    }


    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
}
