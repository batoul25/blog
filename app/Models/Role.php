<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany('App\Models\User' , 'role_user')->withPivot('role_id' , 'user_id');
    }

    public function permissions(){
        return $this->belongsToMany('App\Models\Permission' , 'permission_role')->withPivot('permission_id' , 'role_id');
    }
}

