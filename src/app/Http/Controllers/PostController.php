<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        
        $photoPath = $request->file('photo')->store('photos', 'public');

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'photo' => $photoPath
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(POST $post)
    {   
        // dd($post);   
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, POST $post)
    {
        $data=[
            'title' => $request->title,
            'body' => $request->body
        ];

        if ($request->hasFile('photo')) {
        Storage::disk('public')->delete($post->photo);
        
        $data['photo'] = $request->file('photo')->store('photos', 'public');
    }

        $post->update($data);
        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        Post::findOrFail($id)->delete();
        return redirect()->route('posts.index');
    }
}
