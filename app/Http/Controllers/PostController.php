<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        $categories = ['Technology', 'Health', 'Lifestyle', 'Beauty']; // Predefined categories
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required|in:Technology,Health,Lifestyle,Beauty'
        ]);

        // Save the post to the database
        Post::create($validatedData);

        // Redirect with success message
        return redirect()->route('posts.create')->with('success', 'Post created successfully!');
    }
}
