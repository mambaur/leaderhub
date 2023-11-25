@extends('admin.layouts.main', ['title' => 'Edit Berita', 'menu' => 'posts', 'submenu' => 'post-list'])

@section('styles')
    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Berita</h4>
                        <form class="forms-sample" method="post" action="{{ route('post_edit', $post->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control h-100 @error('title') is-invalid @enderror"
                                    id="title" value="{{ old('title') ?? $post->title }}" name="title"
                                    placeholder="Judul Berita..." required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Gambar/Foto Utama</label>
                                <input type="file" class="form-control h-100 @error('image') is-invalid @enderror"
                                    name="image" id="image">
                                @if (count(@$post->media ?? []))
                                    <small><a href="{{ asset('storage/' . @$post->media[0]->url) }}">Lihat foto
                                            utama</a></small>
                                @endif
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <textarea name="description" id="summernote" style="display: none;">{!! old('description') ?? $post->body !!}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Tipe</label>
                                        <select class="form-control @error('type') is-invalid @enderror"
                                            style="height: 46px" name="type" id="type">
                                            <option value="published" @if (old('type') == 'published' || $post->type == 'published') selected @endif>
                                                Publish</option>
                                            <option value="draft" @if (old('type') == 'draft' || $post->type == 'draft') selected @endif>Draft
                                            </option>
                                        </select>
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">Tanggal</label>
                                        <input type="date" class="form-control h-100 @error('date') is-invalid @enderror"
                                            id="date"
                                            value="{{ old('date') ?? (@$post->published_at != null ? @$post->published_at->format('Y-m-d') : null) }}"
                                            name="date" placeholder="Tanggal..." required>
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" value="1"
                                    @if (old('is_active') || $post->is_active) checked @endif id="is_active" name="is_active">
                                <label class="form-check-label ms-2" for="is_active">
                                    Aktif
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(function() {
            $('#summernote').summernote({
                placeholder: 'Deskripsi',
                tabsize: 2,
                minHeight: 400,
                callbacks: {
                    onImageUpload: function(files) {
                        var formData = new FormData();
                        formData.append('image', files[0]);

                        var csrfToken = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            url: '/upload-image',
                            method: 'POST',
                            data: formData,
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                $('#summernote').summernote('insertImage', response
                                    .file
                                );
                            },
                            error: function(err) {
                                console.error('Upload gagal:', err);
                            }
                        });
                    }
                },
                onInit: function() {
                    $('#summernote')
                        .show();
                }
            });
        });
    </script>
@endsection
