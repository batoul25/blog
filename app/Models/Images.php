<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'post_id',
        'filename'
    ];
    protected $guarded = [];

}
