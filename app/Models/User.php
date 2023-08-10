<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\PostController;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;

use App\Models\Permission;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $guarded = [];

    public function post(){
        return $this->hasMany('App\Models\Post');
    }

    public function role(){
        return $this->belongsToMany('App\Models\Role' , 'role_user')->withPivot('role_id' , 'user_id');
    }

    public function permissions(){
        return $this->belongsToMany('App\Models\Permission' , 'permission_user')->withPivot('permission_id' , 'user_id');
    }

    public function userHasRole(... $role_name){
        foreach ($this->roles() as $role){
            if($role_name == $role->name){
                return true;
            }
            return false;
        }
    }

}
