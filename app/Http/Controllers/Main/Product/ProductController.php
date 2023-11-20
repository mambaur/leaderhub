<?php

namespace App\Http\Controllers\Main\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            return abort(404);
        }

        return view('products.detail', compact('product'));
    }
}
