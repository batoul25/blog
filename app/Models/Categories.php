<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name'
    ];
    protected $guarded = [];
    public function post(){
        return $this->hasMany('App\Models\Post');
    }
}

