<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        // 'user_role' is included because normally Laravel would expect to find a table called role_user, due to it's default alphabetical naming convention.
        return $this->belongsToMany('App\Models\User', 'user_role');
    }

    use HasFactory;
}
