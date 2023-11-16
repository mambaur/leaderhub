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
        $posts = Post::latest()->paginate(10);
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

        $product_categories = ProductCategory::orderBy('name', 'asc')->get();
        return view('posts.detail', compact('product_categories', 'post'));
    }
}
