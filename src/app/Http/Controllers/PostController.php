<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Actor;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
    {
        $posts = Post::latest()->paginate(9);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all(),
            'actors' => Actor::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $photoPath = $request->file('photo')->store('photos', 'public');

        $post = Post::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
            'photo' => $photoPath
        ]);
        if (isset($request->actors)) {
            foreach ($request->actors as $actor) {
                $post->actors()->attach($actor);
            }
        }

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
        Gate::authorize('update', $post);
        
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, POST $post)
    {
        Gate::authorize('update', $post);

        $data = [
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
    public function destroy(Post $post)
    {
        Gate::authorize('delete ', $post);

        if (isset($post->photo)) {
            Storage::disk('public')->delete($post->photo);
        }

        $post->delete();
        return redirect()->route('posts.index');
    }
}
