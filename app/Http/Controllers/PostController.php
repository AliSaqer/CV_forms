<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // $Posts = Post::all();
        // $Posts = Post::paginate(20);
        // $Posts = Post::simplepaginate();
        $Posts = Post::find(15);

        dd($Posts->title);
        return view('Posts.index',compact('Posts'));
    }
}
