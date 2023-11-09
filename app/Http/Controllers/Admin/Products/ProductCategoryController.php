<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_categories = ProductCategory::orderBy('name', 'asc')->get();
        return view('admin.product-categories.index', compact('product_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product_categories',
        ]);

        ProductCategory::create([
            'name' => $request->name,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        toast('Product category successfully created', 'success');
        return redirect()->route('product_category_list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product_category = ProductCategory::find($id);
        if (!$product_category) {
            toast('Product category not found', 'error');
            return back()->withInput();
        }
        return view('admin.product-categories.edit', compact('product_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $product_category = ProductCategory::find($id);
        if (!$product_category) {
            toast('Product category not found', 'error');
            return back()->withInput();
        }

        $product_category->name = $request->name;
        $product_category->updated_by = auth()->user()->id;
        $product_category->save();

        toast('Product category successfully updated', 'success');
        return redirect()->route('product_category_list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product_category = ProductCategory::find($id);
        if (!$product_category) {
            toast('Product category not found', 'error');
            return back()->withInput();
        }

        DB::beginTransaction();

        $product_category->updated_by = auth()->user()->id;
        $product_category->save();
        $product_category->delete();

        DB::commit();

        toast('Product category successfully deleted', 'success');
        return redirect()->route('product_category_list');
    }
}
