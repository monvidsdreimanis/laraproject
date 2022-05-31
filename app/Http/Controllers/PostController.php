<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        //dd($posts);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostCreateRequest $request)
    {
        //dd($request);
        //$requestData = $request->all();

        $validatedData = $request ->validated();
        // $validatedData = $request->validate([
        //     'title' => 'required|unique:posts',
        //     'body' => 'required',
        //     'author_name' => 'nullable',
        // ]);

        //dd($requestData);
        $post = Post::create([
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
            'author_name' => $validatedData['author_name'],
        ]);

        $post->save();

        //return redirect()->back();

        //return redirect()->route('posts.show', ['post' => $post]);
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        //dd($id);
        //$post = Post::findOrFail($id);
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)

    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'author_name' => 'nullable',
        ]);

        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->author_name = $validatedData['author_name'];

        $post->save();

        // return redirect()->route('posts.show', ['post' => $post]); 
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
