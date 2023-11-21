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

    public function getDataProduct(Request $request)
    {
        $districts = Product::where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%');
        })
            ->limit(20)
            ->get();

        $data = [];
        foreach ($districts as $item) {
            $data[] = [
                'id' => $item->id,
                'slug' => $item->slug,
                'value' => $item->name,
            ];
        }

        if (!count($data)) {
            $data[] = [
                'id' => null,
                'value' => "Produk tidak ditemukan",
            ];
        }
        return $data;
    }
}
