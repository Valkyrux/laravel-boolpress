<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $counts = [];
        foreach ($categories as $category) {
            $counts[$category->id] = Post::where('category_id', $category->id)->count();
        }
        $data = ['categories' => $categories, 'counts' => $counts];
        return view('admin.categories.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $selected_posts = Post::where('category_id', $category->id)->paginate(10);
        $data = ['category' => $category, 'posts' => $selected_posts];
        return view('admin.categories.show', $data);
    }
}
