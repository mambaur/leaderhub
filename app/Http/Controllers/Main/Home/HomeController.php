<?php

namespace App\Http\Controllers\Main\Home;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Post;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all()->groupBy('key');
        $post = Post::latest()->first();
        $product_categories = ProductCategory::orderBy('name', 'asc')->get();
        return view('home', compact('product_categories', 'company', 'post'));
    }
}
