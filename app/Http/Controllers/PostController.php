<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("created_at","desc")->paginate(10);

        return view("posts.index", compact("posts"));
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(StorePostRequest $request)
    {

        if($request->hasFile("file")){
            $filename = $request->file("file")->getClientOriginalName();
            $path = $request->file("file")->storeAs("post-photos", $filename);
        }

        $post = Post::create([
            "title"=> $request->title,
            'desc'=> $request->desc,
            'user_id'=> auth()->user()->id,
            'file'=> $path ?? null,
        ]);
    }

    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    public function edit(Post $post)
    {
        return view("posts.edit", compact("post"));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if($request->hasFile("file")){
            if(isset($post->file)){
                Storage::delete($post->file);
            }
            $filename = $request->file("file")->getClientOriginalName();
            $path = $request->file("file")->storeAs("post-photos", $filename);
        }

        $post->update([
            "title"=> $request->title,
            'desc'=> $request->desc,
            'file'=> $path ?? null,
        ]);

        return redirect()->route('posts.show')->with(['success'=>'post updated', 'post'=>$post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.index")->with("success","post deleted");
    }
}
