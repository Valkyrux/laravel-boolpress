<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_post = new Post();
        $validated = $request->validate([
            'title' => 'required|max:240',
            'content' => 'required',
        ]);

        $validated['user_id'] = Auth::id();
        if ($validated) {
            $new_post->fill($validated);
            $new_post->slug = $new_post->auto_generate_slug();
            $new_post->save();
            return redirect()->route('admin.posts.show', $new_post);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\Model\Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:240',
            'content' => 'required',
        ]);

        $validated['user_id'] = Auth::id();
        if ($validated) {
            $post->fill($validated);
            $post->slug = $post->auto_generate_slug();
            $post->update();
            return redirect()->route('admin.posts.show', $post);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myPostIndex()
    {
        $posts = Post::orderBy('created_at', 'DESC')->where('user_id', Auth::id())->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }
}
