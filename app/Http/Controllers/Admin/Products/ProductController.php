<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $product = Product::select('products.*')->with(['product_category']);
            return DataTables::eloquent($product)
                ->editColumn('name', function (Product $product) {
                    return "<h6>$product->name</h6>";
                })
                ->editColumn('created_at', function (Product $product) {
                    return "<h6>" . $product->created_at->format('Y-m-d h:i:s') . "</h6>";
                })
                ->editColumn('product_category.name', function (Product $product) {
                    return "<h6>" . @$product->product_category->name ?? '-' . "</h6>";
                })
                ->addColumn('action', function (Product $product) {
                    $action = "
                    <div class='text-end'>
                        <a class='btn btn-primary py-1'
                            href='" . route('product_edit', $product->id) . "'>
                            Edit</a>
                        <a href='#' class='btn btn-danger btn-delete py-1'
                            data-bs-toggle='modal' data-bs-target='#deleteModal'
                            data-url='" . route('product_delete', $product->id) . "'>
                            Delete</a>
                    </div>
                    ";

                    return $action;
                })
                ->rawColumns(['action', 'name', 'created_at', 'product_category.name'])
                ->toJson();
        }

        $total_product = Product::count();

        return view('admin.products.index', compact('total_product'));
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
            'description' => $request->description,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

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

                    $product->media()->save($media);
                } catch (\Throwable $th) {
                }
            }
        }

        toast('Product successfully created', 'success');
        return redirect()->route('product_list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product_categories = ProductCategory::orderBy('name', 'asc')->get();
        $product = Product::find($id);
        if (!$product) {
            toast('Product not found', 'error');
            return back();
        }

        return view('admin.products.edit', compact('product', 'product_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'galleries.*' => 'image|file|max:8192',
        ]);

        $product = Product::find($id);
        if (!$product) {
            toast('Product not found', 'error');
            return back()->withInput();
        }

        DB::beginTransaction();

        $product->name = $request->name;
        $product->product_category_id = $request->product_category_id;
        $product->description = $request->description;
        $product->updated_by = auth()->user()->id;
        $product->save();

        $pathimage = @$request->imagesold ?? [];

        foreach (@$product->media ?? [] as $item) {
            if (!in_array($item->url, $pathimage)) {
                if (Storage::exists(@$item->url)) {
                    Storage::delete(@$item->url);
                }
                $item->delete();
            }
        }

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

                    $product->media()->save($media);
                } catch (\Throwable $th) {
                }
            }
        }

        DB::commit();

        toast('Product successfully updated', 'success');
        return redirect()->route('product_list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            toast('Product not found', 'error');
            return back()->withInput();
        }

        $product->updated_by = auth()->user()->id;
        $product->save();

        foreach (@$product->media ?? [] as $item) {
            if (@$item->url) {
                if (Storage::exists(@$item->url)) {
                    Storage::delete(@$item->url);
                }
            }
            $item->delete();
        }

        $product->media()->detach();

        $product->delete();

        toast('Download center successfully deleted', 'success');
        return redirect()->route('product_list');
    }
}
