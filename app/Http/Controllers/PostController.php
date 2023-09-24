<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function intro(Post $post)
    {
        return inertia("Post/Intro");
    }
    
    
    public function index(Post $post)
    {
        /*web.php->controller->(model)->view(front)*/
        return inertia("Post/Index",["posts" => $post->get()]);
    }
    
    public function show(Post $post)
    {
        return inertia("Post/Show", ["post" => $post]);
    }
    
    public function create()
    {
         return inertia("Post/Create");
    }
    
    //use Redirect;
    public function store(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $input += ['user_id' => $request->user()->id];    
        $post->fill($input)->save();
        return Redirect::route('post.show', $post->id);
    }
    
    public function edit(Post $post)
    {
        return inertia("Post/Edit", ["post" => $post]);
    }
        
public function update(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input)->save();
        return Redirect::route('post.show' ,$post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return Redirect::route('post.index');
    }
}
