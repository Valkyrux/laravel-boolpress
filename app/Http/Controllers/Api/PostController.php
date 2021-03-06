<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return response()->json([
            'response' => true,
            'result' => $posts
        ]);
    }

    public function randomOrder()
    {
        $posts = Post::inRandomOrder()->limit(4)->get();
        return response()->json([
            'response' => true,
            'result' => $posts
        ]);
    }
}
