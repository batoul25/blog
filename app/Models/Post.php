<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'user_id',
        'category_id',
        'title',
        'content'
    ];
    protected $guarded = [];

    public function tags(){
        return $this->belongsToMany('App\Models\Tags' , 'posts_tags')->withPivot('post_id' , 'tag_id');
    }

    public function images(){
        return $this->hasMany('App\Models\Images');
    }
}
