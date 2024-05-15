<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // $Posts = Post::all();
        $Posts = Post::paginate(20);
        // $Posts = Post::simplepaginate();
        // $Posts = Post::find(4444);

        // if(!$Posts){
        //     abort(404);
        // }

        // $Posts = Post::findOrFail(2);

        // $Users = User::where('email','ali@email.com')->get();
        // $Users = User::where('email','ali@email.com')->first();

        // dd($Users->email);
        return view('Posts.index',compact('Posts'));
    }

    public function post_search (Request $request){
        $post = Post::Where('title' , 'LIKE' , '%'.$request->keyword.'%')->limit(10)->get();
        return $post;
    }
}
