@extends('admin.layouts.main', ['title' => 'Tambah Produk', 'menu' => 'products', 'submenu' => 'product-create'])

@section('styles')
    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet"
        href="{{ url('/') }}/admin-assets/vendors/image-uploader/dist/image-uploader.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Produk</h4>
                        <form class="forms-sample" method="post" action="{{ route('product_store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control h-100 @error('name') is-invalid @enderror"
                                    id="name" value="{{ old('name') }}" name="name" placeholder="Nama Produk..."
                                    required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="product_category_id">Kategori</label>
                                <select class="form-control @error('product_category_id') is-invalid @enderror"
                                    style="height: 46px" name="product_category_id" id="product_category_id">
                                    @foreach ($product_categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="name">Gallery</label>
                                <div class="col-sm-12">
                                    <div class="input-images"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gallery_description">Deskripsi Gallery</label>
                                <input type="text"
                                    class="form-control h-100 @error('gallery_description') is-invalid @enderror"
                                    id="gallery_description" value="{{ old('gallery_description') }}"
                                    name="gallery_description" placeholder="Deskripsi Gallery..." required>
                                @error('gallery_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div id="summernote-container" class="mb-4" style="display: none;">
                                <textarea name="description" id="summernote"></textarea>
                            </div>

                            <div class="form-group row d-flex align-items-center">
                                <label for="url[]" class="col-md-1">URL</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control h-100" id="url_title[]" name="url_title[]"
                                        placeholder="Judul...">
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control h-100" id="url[]" name="url[]"
                                        placeholder="URL...">
                                </div>
                                <div class="col-md-1">
                                    <a type="button" class="delete-url">
                                        <i class="menu-icon mdi mdi-window-close"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-end mt-3 url">
                                <button type="button" class="btn btn-outline-primary add-url">+ Tambah URL</button>
                            </div>

                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" value="1" checked id="is_active"
                                    name="is_active">
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

    <script type="text/javascript"
        src="{{ url('/') }}/admin-assets/vendors/image-uploader/dist/image-uploader.min.js"></script>

    <script>
        $(function() {
            $('#summernote').summernote({
                placeholder: 'Deskripsi',
                tabsize: 2,
                minHeight: 400,
                callbacks: {
                    onImageUpload: function(files) {
                        var formData = new FormData();
                        formData.append('image', files[
                            0]);

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
                    },
                    onInit: function() {
                        $('#summernote-container')
                            .show();
                    }
                }
            });
        });

        $('.input-images').imageUploader({
            imagesInputName: 'galleries',
        })

        $(".add-url").click(function() {
            $(this).closest(".url").before(
                `<div class="form-group row d-flex align-items-center">
                                <label for="url[]" class="col-md-1">URL</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control h-100" id="url_title[]" name="url_title[]"
                                        placeholder="Judul...">
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control h-100" id="url[]" name="url[]"
                                        placeholder="URL...">
                                </div>
                                <div class="col-md-1">
                                    <a type="button" class="delete-url">
                                        <i class="menu-icon mdi mdi-window-close"></i>
                                    </a>
                                </div>
                            </div>`
            );
            getSearchAgent();
        });

        $(document).on("click", "a.delete-url", function() {
            $(this).parent().parent().remove();
        });
    </script>
@endsection
