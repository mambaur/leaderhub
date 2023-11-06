<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_categories = ProductCategory::orderBy('name', 'asc')->get();
        return view('admin.products.create', compact('product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'galleries.*' => 'image|file|max:8192',
        ]);

        $product = Product::create([
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        $media_ids = [];
        if ($request->hasFile('galleries')) {
            $fileimages = $request->file('galleries');
            foreach ($fileimages as $image) {

                try {
                    $path_image = @$image->store('images');

                    $media = Media::create([
                        'name' => $request->name,
                        'type' => 'product',
                        'url' => $path_image,
                        'alt' => $request->name,
                        'title' => $request->name,
                        // 'description' => ,
                        'created_by' => auth()->user()->id,
                        'updated_by' => auth()->user()->id,
                    ]);

                    $media_ids[] = $media->id;
                } catch (\Throwable $th) {
                }
            }

            $product->media()->attach([$media->id]);
        }

        toast('Product successfully created', 'success');
        return redirect()->route('product_list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
