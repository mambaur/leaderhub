<?php

namespace App\Http\Controllers\Admin\Images;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

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

    public function getImageSliders(Request $request)
    {
        $model = Company::where('key', 'sliders')->first();

        $data = [];
        foreach (@$model->media ?? [] as $item) {
            $data[] = [
                'id' => $item->url,
                'src' => asset('storage/' . $item->url),
            ];
        }
        return $data;
    }

    public function uploadLargeFiles(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.' . $extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= ' - ' . Str::random(5) . '.' . $extension; // a unique file name

            $path = Storage::putFileAs('files', $file, $fileName);

            // $path = Storage::putFile('files', $file);

            // delete chunked file
            unlink($file->getPathname());
            return [
                'path' => asset('storage/' . $path),
                'filename' => $fileName,
                'storage_path' => $path
            ];
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }
}
