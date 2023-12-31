<?php

namespace App;

use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'role_permission');
    }


}
