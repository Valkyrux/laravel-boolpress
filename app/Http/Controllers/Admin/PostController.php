<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Model\Post;
use App\Model\Category;
use App\Model\Tag;

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
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', ['tags' => $tags, 'categories' => $categories]);
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


        $image_path = Storage::put('uploads', $request->image);

        $validated = $request->validate([
            'title' => 'required|max:240',
            'content' => 'required',
            'category_id' => 'required|exists:App\Model\Category,id',
            'tags.*' => 'nullable|exists:App\Model\Category,id',
        ]);

        $validated['user_id'] = Auth::id();
        if ($validated) {
            $new_post->fill($validated);
            $new_post->slug = $new_post->auto_generate_slug();
            $new_post->save();

            if (!empty($request->tags)) {
                $new_post->tags()->attach($request->tags);
            }

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
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
        if (Auth::id() == $post->user_id) {
            $validated = $request->validate([
                'title' => 'required|max:240',
                'content' => 'required',
                'category_id' => 'required|exists:App\Model\Category,id',
                'tag_id' => 'nullable|exists:App\Model\Tag,id',
            ]);

            if ($validated) {
                $post->fill($validated);
                $post->slug = $post->auto_generate_slug();
                $post->update();

                if (!empty($request->tags)) {
                    $post->tags()->sync($request->tags);
                } else {
                    $post->tags()->detach();
                }

                return redirect()->route('admin.posts.show', $post);
            }
        } else {
            abort('403');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::id() == $post->user_id) {
            $post->delete();
            return redirect()->route('admin.posts.index');
        } else {
            abort('403');
        }
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
