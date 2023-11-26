<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::query();
            return DataTables::eloquent($data)
                ->editColumn('title', function (Post $item) {
                    return "<h6><a class='text-decoration-none text-dark' href='" . route('show_post', $item->slug) . "'>$item->title</a></h6>";
                })
                ->editColumn('type', function (Post $item) {
                    $type = ucfirst($item->type);
                    return "<h6>$type</h6>";
                })
                ->editColumn('is_active', function (Post $post) {
                    $status = @$post->is_active ? "Aktif" : "Tidak aktif";
                    return "<h6>" . $status . "</h6>";
                })
                ->editColumn('published_at', function (Post $item) {
                    $published_at = @$item->published_at != null ? $item->published_at->format('d F Y') : '';
                    return "<h6>" . $published_at . "</h6>";
                })
                ->addColumn('action', function (Post $item) {
                    $action = "
                    <div class='text-end'>
                        <a class='btn btn-primary py-1'
                            href='" . route('post_edit', $item->id) . "'>
                            Edit</a>
                        <a href='#' class='btn btn-danger btn-delete py-1'
                            data-bs-toggle='modal' data-bs-target='#deleteModal'
                            data-url='" . route('post_delete', $item->id) . "'>
                            Hapus</a>
                    </div>
                    ";

                    return $action;
                })
                ->rawColumns(['action', 'published_at', 'title', 'type', 'is_active'])
                ->toJson();
        }

        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
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

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->description,
            'type' => $request->type,
            'is_active' => $request->is_active,
            'published_at' => $request->date,
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

            $post->media()->save($media);
        }


        DB::commit();

        toast('Berita berhasil ditambahkan.', 'success');
        return redirect()->route('post_list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            toast('Berita tidak ditemukan.', 'error');
            return back()->withInput();
        }
        return view('admin.posts.edit', compact('post'));
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

        $post = Post::find($id);
        if (!$post) {
            toast('Berita tidak ditemukan.', 'error');
            return back()->withInput();
        }

        $post->title = $request->title;
        $post->body = $request->description;
        $post->type = $request->type;
        $post->is_active = $request->is_active;
        $post->published_at = $request->date;
        $post->updated_by = auth()->user()->id;
        $post->save();

        $path_image = null;

        if (@$request->file('image')) {
            foreach (@$post->media ?? [] as $item) {
                if (@$item->url) {
                    if (Storage::exists(@$item->url)) {
                        Storage::delete(@$item->url);
                    }
                }

                $item->delete();
            }

            $post->media()->detach();

            try {
                $path_image = @$request->file('image')->store('images');
            } catch (\Throwable $th) {
            }

            $media = Media::create([
                'name' => $request->name,
                'type' => @$request->file('image')->getClientMimeType(),
                'url' => $path_image,
                'alt' => "$request->name - $request->description",
                'title' => $request->name,
                'description' => $request->description,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            $post->media()->save($media);
        }


        toast('Berita anda berhasil diupdate.', 'success');
        return redirect()->route('post_list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            toast('Berita tidak ditemukan.', 'error');
            return back()->withInput();
        }

        DB::beginTransaction();

        $post->updated_by = auth()->user()->id;
        $post->save();

        foreach (@$post->media ?? [] as $item) {
            if (@$item->url) {
                if (Storage::exists(@$item->url)) {
                    Storage::delete(@$item->url);
                }
            }
            $item->delete();
        }

        $post->media()->detach();

        $post->delete();

        DB::commit();

        toast('Berita berhasil dihapus.', 'success');
        return redirect()->route('post_list');
    }
}
