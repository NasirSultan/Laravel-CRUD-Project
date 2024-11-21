<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a list of all posts
    public function index(Request $request)
    {
        $query = Post::query();
    
        if ($request->has('search')) {
            $searchTerm = $request->get('search');
            $query->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('body', 'like', "%{$searchTerm}%");
        }
    
        // Paginate the results
        $posts = $query->paginate(10); // Show 10 posts per page
    
        return view('posts.index', compact('posts'));
    }
    
    // Show the form for creating a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();
        return redirect()->route('posts.index');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        
        // Delete the image from storage (optional)
        if ($post->image) {
            unlink(public_path('images/'.$post->image));
        }
    
        $post->delete();
        return redirect()->route('posts.index');
    }

}
