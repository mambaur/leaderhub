<?php

namespace App\Http\Controllers\Admin\DownloadCenter;

use App\Http\Controllers\Controller;
use App\Models\DownloadCenter;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DownloadCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $download_centers = DownloadCenter::orderBy('name', 'asc')->get();
        return view('admin.download-centers.index', compact('download_centers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.download-centers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product_categories',
            'url' => 'required',
            'image' => 'file|mimes:jpeg,jpg,png|max:1024', // 1MB = 1024 kilobytes,
        ]);

        DB::beginTransaction();

        $download_center = DownloadCenter::create([
            'name' => $request->name,
            'url' => $request->url,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);


        if (@$request->file('image')) {
            $path_image = null;

            try {
                $path_image = @$request->file('image')->store('images');
            } catch (\Throwable $th) {
            }

            $media = Media::create([
                'name' => $request->name,
                'type' => 'download_center',
                'url' => $path_image,
                'alt' => "$request->name - $request->description",
                'title' => $request->name,
                'description' => $request->description,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            $download_center->media()->save($media);
        }


        DB::commit();

        toast('Download center successfully created', 'success');
        return redirect()->route('download_center_list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $download_center = DownloadCenter::find($id);
        if (!$download_center) {
            toast('Download center not found', 'error');
            return back()->withInput();
        }
        return view('admin.download-centers.edit', compact('download_center'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'image' => 'file|mimes:jpeg,jpg,png|max:1024', // 1MB = 1024 kilobytes,
        ]);

        $download_center = DownloadCenter::find($id);
        if (!$download_center) {
            toast('Download center not found', 'error');
            return back()->withInput();
        }

        $download_center->name = $request->name;
        $download_center->url = $request->url;
        $download_center->description = $request->description;
        $download_center->updated_by = auth()->user()->id;
        $download_center->save();

        $path_image = null;

        if (@$request->file('image')) {
            foreach (@$download_center->media ?? [] as $item) {
                if (@$item->url) {
                    if (Storage::exists(@$item->url)) {
                        Storage::delete(@$item->url);
                    }
                }

                $item->delete();
            }

            $download_center->media()->detach();

            try {
                $path_image = @$request->file('image')->store('images');
            } catch (\Throwable $th) {
            }

            $media = Media::create([
                'name' => $request->name,
                'type' => 'download_center',
                'url' => $path_image,
                'alt' => "$request->name - $request->description",
                'title' => $request->name,
                'description' => $request->description,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            $download_center->media()->save($media);
        }


        toast('Download center successfully updated', 'success');
        return redirect()->route('download_center_list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $download_center = DownloadCenter::find($id);
        if (!$download_center) {
            toast('Download center not found', 'error');
            return back()->withInput();
        }

        $download_center->updated_by = auth()->user()->id;
        $download_center->save();

        foreach (@$download_center->media ?? [] as $item) {
            if (@$item->url) {
                if (Storage::exists(@$item->url)) {
                    Storage::delete(@$item->url);
                }
            }
            $item->delete();
        }

        $download_center->media()->detach();

        $download_center->delete();

        toast('Download center successfully deleted', 'success');
        return redirect()->route('download_center_list');
    }
}
