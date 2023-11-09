<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('title', 'asc')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'file|mimes:jpeg,jpg,png|max:1024', // 1MB = 1024 kilobytes,
        ]);

        DB::beginTransaction();

        $service = Service::create([
            'title' => $request->title,
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
                'name' => $request->title,
                'type' => @$request->file('image')->getClientMimeType(),
                'url' => $path_image,
                'alt' => $request->title,
                'title' => $request->title,
                'description' => $request->description,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            $service->media()->save($media);
        }


        DB::commit();

        toast('Service successfully created', 'success');
        return redirect()->route('service_list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::find($id);
        if (!$service) {
            toast('Service not found', 'error');
            return back()->withInput();
        }
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'file|mimes:jpeg,jpg,png|max:1024', // 1MB = 1024 kilobytes,
        ]);

        $service = Service::find($id);
        if (!$service) {
            toast('Service not found', 'error');
            return back()->withInput();
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->updated_by = auth()->user()->id;
        $service->save();

        $path_image = null;

        if (@$request->file('image')) {
            foreach (@$service->media ?? [] as $item) {
                if (@$item->url) {
                    if (Storage::exists(@$item->url)) {
                        Storage::delete(@$item->url);
                    }
                }

                $item->delete();
            }

            $service->media()->detach();

            try {
                $path_image = @$request->file('image')->store('images');
            } catch (\Throwable $th) {
            }

            $media = Media::create([
                'name' => $request->title,
                'type' => @$request->file('image')->getClientMimeType(),
                'url' => $path_image,
                'alt' => $request->title,
                'title' => $request->title,
                'description' => $request->description,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            $service->media()->save($media);
        }


        toast('Service successfully updated', 'success');
        return redirect()->route('service_list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        if (!$service) {
            toast('Service not found', 'error');
            return back()->withInput();
        }

        DB::beginTransaction();

        $service->updated_by = auth()->user()->id;
        $service->save();

        foreach (@$service->media ?? [] as $item) {
            if (@$item->url) {
                if (Storage::exists(@$item->url)) {
                    Storage::delete(@$item->url);
                }
            }
            $item->delete();
        }

        $service->media()->detach();

        $service->delete();

        DB::commit();

        toast('Service successfully deleted', 'success');
        return redirect()->route('service_list');
    }
}
