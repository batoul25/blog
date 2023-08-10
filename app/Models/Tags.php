<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'name'
    ];
    protected $guarded = [];


    public function post(){
        return $this->belongsToMany('App\Models\Post' , 'posts_tags')->withPivot('post_id' , 'tag_id');
    }

}
