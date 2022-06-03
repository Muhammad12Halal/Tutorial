<?php

namespace App\Repository;

use App\Interface\PostInterface;
use App\Models\Post;

class PostRepository implements PostInterface
{
    protected $post = null;

    public function index()
    {
        return Post::get();
    }

    public function indexAPI($collection = [])
    {
        if($collection['keyword'] != ''){
            return Post::where('name','LIKE','%'.$collection['keyword'].'%')->get();
        }else{
            return Post::get();
        }
    }

    public function create()
    {

    }

    public function storeUser($request)
    {
        $post = new Post();
        $post->name = $request->name;
        $post->studentID = $request->studentID;
        $post->phone = $request->phone;
        $post->ic = $request->ic;
        $post->email = $request->email;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $post->save();
        return $post;
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function edit($id)
    {
        return Post::find($id);
    }

    public function updateUser($id, $request)
    {
        $post = Post::find($id);
        $post->name = $request->name;
        $post->studentID = $request->studentID;
        $post->phone = $request->phone;
        $post->ic = $request->ic;
        $post->email = $request->email;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }
        $post->save();
        return $post;
    }

    public function destroyUser($id)
    {
        return Post::find($id)->delete();
    }
}
