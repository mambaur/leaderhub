<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductUrl;
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
            $products = Product::select('products.*')->with(['product_category']);
            return DataTables::eloquent($products)
                ->editColumn('name', function (Product $product) {
                    return "<h6>$product->name</h6>";
                })
                ->editColumn('is_active', function (Product $product) {
                    $status = @$product->is_active ? "Active" : "Inactive";
                    return "<h6>" . $status . "</h6>";
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
                ->rawColumns(['action', 'name', 'created_at', 'product_category.name', 'is_active'])
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

        DB::beginTransaction();

        $product = Product::create([
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'is_active' => $request->is_active,
            'gallery_description' => $request->gallery_description,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        foreach ($request->url as $key => $item) {
            if ($item) {
                ProductUrl::create([
                    'product_id' => $product->id,
                    'title' => @$request->url_title[$key],
                    'url' => $item,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
            }
        }

        if ($request->hasFile('galleries')) {
            $fileimages = $request->file('galleries');
            foreach ($fileimages as $image) {

                try {
                    $path_image = @$image->store('images');

                    $media = Media::create([
                        'name' => $request->name,
                        'type' => @$image->getClientMimeType(),
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
        $product->is_active = $request->is_active;
        $product->product_category_id = $request->product_category_id;
        $product->description = $request->description;
        $product->gallery_description = $request->gallery_description;
        $product->updated_by = auth()->user()->id;
        $product->save();

        ProductUrl::where('product_id', $product->id)->delete();

        foreach (@$request->url ?? [] as $key => $item) {
            if ($item) {
                ProductUrl::create([
                    'product_id' => $product->id,
                    'title' => @$request->url_title[$key],
                    'url' => $item,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
            }
        }

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
                        'type' => @$image->getClientMimeType(),
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
                'value' => $item->name,
            ];
        }

        if (!count($data)) {
            $data[] = [
                'id' => null,
                'value' => "Product not found",
            ];
        }
        return $data;
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

        DB::beginTransaction();

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

        DB::commit();

        toast('Download center successfully deleted', 'success');
        return redirect()->route('product_list');
    }
}
