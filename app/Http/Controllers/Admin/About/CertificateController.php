<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::orderBy('title', 'asc')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificates.create');
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

        $certificate = Certificate::create([
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

            $certificate->media()->save($media);
        }


        DB::commit();

        toast('Sertifikat berhasil ditambahkan.', 'success');
        return redirect()->route('certificate_list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $certificate = Certificate::find($id);
        if (!$certificate) {
            toast('Sertifikat tidak ditemukan', 'error');
            return back()->withInput();
        }
        return view('admin.certificates.edit', compact('certificate'));
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

        $certificate = Certificate::find($id);
        if (!$certificate) {
            toast('Sertifikat tidak ditemukan.', 'error');
            return back()->withInput();
        }

        $certificate->title = $request->title;
        $certificate->description = $request->description;
        $certificate->updated_by = auth()->user()->id;
        $certificate->save();

        $path_image = null;

        if (@$request->file('image')) {
            foreach (@$certificate->media ?? [] as $item) {
                if (@$item->url) {
                    if (Storage::exists(@$item->url)) {
                        Storage::delete(@$item->url);
                    }
                }

                $item->delete();
            }

            $certificate->media()->detach();

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

            $certificate->media()->save($media);
        }


        toast('Sertifikat berhasil diupdate.', 'success');
        return redirect()->route('certificate_list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $certificate = Certificate::find($id);
        if (!$certificate) {
            toast('Sertifikat tidak ditemukan.', 'error');
            return back()->withInput();
        }

        DB::beginTransaction();

        $certificate->updated_by = auth()->user()->id;
        $certificate->save();

        foreach (@$certificate->media ?? [] as $item) {
            if (@$item->url) {
                if (Storage::exists(@$item->url)) {
                    Storage::delete(@$item->url);
                }
            }
            $item->delete();
        }

        $certificate->media()->detach();

        $certificate->delete();

        DB::commit();

        toast('Sertifikat berhasil dihapus.', 'success');
        return redirect()->route('certificate_list');
    }
}
