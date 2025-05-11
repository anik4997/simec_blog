<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // public function index() {
    //     $posts = Post::latest()->take(10)->get();
    //     return view('posts.index', compact('posts'));
    // }
    public function index() {
        $posts = Post::latest()->take(10)->get();
        $hasPosts = $posts->count() > 0;
    
        return view('posts.index', [
            'posts' => $posts,
            'hasPosts' => $hasPosts
        ]);
    }
    
    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        Post::create($request->only('title', 'body'));

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }
}
