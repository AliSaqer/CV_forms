<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request as FacadesRequest;

class PostController extends Controller
{
    public function index()
    {
        // dd(request()->keyword);
        // $Posts = Post::all();
        // $Posts = Post::latest()->paginate(20);
        // $Posts = Post::orderby('id','desc')->paginate(20);
        // $Posts = Post::orderbydesc('id')->paginate(5);
        // $Posts = Post::simplepaginate();
        // $Posts = Post::find(4444);

        // if(!$Posts){
        //     abort(404);
        // }

        // $Posts = Post::findOrFail(2);

        // $Users = User::where('email','ali@email.com')->get();
        // $Users = User::where('email','ali@email.com')->first();

        // dd($Users->email);
        // if (request()->has('keyword')) {
        $Posts = Post::Where('title', 'LIKE', '%' . request()->keyword . '%')->orderbydesc('id')
            ->paginate(10);
        // } else {
        // $Posts = Post::orderbydesc('id')->paginate(10);
        // }
        return view('Posts.index', compact('Posts'));
    }
    //search
    public function post_search(Request $request)
    {
        $post = Post::Where('title', 'LIKE', '%' . $request->keyword . '%')
            ->limit(10)
            ->get();
        return $post;
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        // 1 validate
        //we did it in PostRequest
        // 2 uploads files
        $imgName = time() . rand() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $imgName);
        // 3 save to database
        //method 1
        // $post = new Post();
        // $post->title = $request->title;
        // $post->image = $imgName;
        // $post->body = $request->body;
        // $post->save();
        //method 2 and more common
        Post::create([
            'title' => $request->title,
            'email' => $request->email,
            'image' => $imgName,
            'body' => $request->body
        ]);

        // 4 redirect to another bage

        return redirect()->route('Post.index')->with('msg', 'Posted successfully');
        // dd($request->all());
    }
    //updae
    public function update(PostRequest $request, $id)
    {
        $Post = Post::findOrFail($id);

        $imgName = $Post->image;

        if ($request->hasFile('image')) {
            $imgName = time() . rand() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $imgName);
        }


        $Post->update([
            'title' => $request->title,
            'email' => $request->email,
            'image' => $imgName,
            'body' => $request->body
        ]);
        return $Post;
    }
    //delete
    public function destroy($id)
    {
        //delete the record without attachment like image
        // Post::destroy($id);
        $post = Post::findOrFail($id);
        File::delete(public_path('uploads/' . $post->image));
        $post->delete();
        return redirect()->route('Post.index')->with('msg', 'deleted successfully');
    }
}
