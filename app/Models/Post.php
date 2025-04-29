<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
//this method dectate which filed go to db
    // protected $fillable = [
    //     'title',
    //     'image',
    //     'body',
    // ];
        //or
        //this dectate which dose not go to db
    protected $guarded = [];
}
