<?php

namespace App\Http\Controllers\Admin\Images;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function uploadImage(Request $request)
    {
        $image = $request->file('image');
        $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('images', $imageName, 'public');

        return response()->json(['success' => true, 'file' => url('storage/images/' . $imageName)]);
    }

    public function getImages(Request $request, $id)
    {
        $model = Product::find($id);
        $data = [];
        foreach (@$model->media ?? [] as $item) {
            $data[] = [
                'id' => $item->url,
                'src' => asset('storage/' . $item->url),
            ];
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
