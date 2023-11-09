<?php

namespace App\Http\Controllers\Admin\Images;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
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
}
