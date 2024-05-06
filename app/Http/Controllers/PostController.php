<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // $Posts = Post::all();
        $Posts = Post::paginate(20);

        return view('Posts.index',compact('Posts'));
    }
}
