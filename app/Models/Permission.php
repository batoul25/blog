<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany('App\Models\User' , 'permission_user')->withPivot('permission_id' , 'user_id');
    }

    public function role(){
        return $this->belongsToMany('App\Models\Role' , 'permission_role')->withPivot('permission_id' , 'role_id');
    }
}
