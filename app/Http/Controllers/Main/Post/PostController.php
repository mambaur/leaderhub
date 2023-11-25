<?php

namespace App\Http\Controllers\Main\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit = 10;
        $posts = Post::latest()->paginate($limit);
        $product_categories = ProductCategory::orderBy('name', 'asc')->get();
        return view('posts.index', compact('product_categories', 'posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            return abort(404);
        }

        return view('posts.detail', compact('post'));
    }
}
