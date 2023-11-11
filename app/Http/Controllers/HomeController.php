<?php

namespace App\Http\Controllers;

use App\Models\Guarantee;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_products = Product::where('is_active', 1)->count();
        $total_guarantees = Guarantee::count();
        $total_posts = Post::where('is_active', 1)->count();
        return view('admin.home.index', compact('total_products', 'total_guarantees', 'total_posts'));
    }
}
