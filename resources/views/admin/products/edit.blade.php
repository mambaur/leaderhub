@extends('admin.layouts.main', ['title' => 'Edit Produk', 'menu' => 'products', 'submenu' => 'product-list'])

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet"
        href="{{ url('/') }}/admin-assets/vendors/image-uploader/dist/image-uploader.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Produk</h4>
                        <form class="forms-sample" method="post" action="{{ route('product_update', $product->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control h-100 @error('name') is-invalid @enderror"
                                    id="name" value="{{ old('name') ?? $product->name }}" name="name"
                                    placeholder="Nama Produk..." required>
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
                                        <option value="{{ $item->id }}"
                                            @if (old('product_category_id') == $item->id || $product->product_category_id == $item->id) selected @endif>{{ $item->name }}</option>
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
                                    id="gallery_description"
                                    value="{{ old('gallery_description') ?? $product->gallery_description }}"
                                    name="gallery_description" placeholder="Deskripsi Gallery..." required>
                                @error('gallery_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div id="editor" class="mb-4" style="min-height: 400px">{!! $product->description !!}</div>
                            <input type="hidden" name="description" id="description" value="">

                            @if (count(@$product->urls ?? []))
                                @foreach (@$product->urls as $item)
                                    <div class="form-group row d-flex align-items-center">
                                        <label for="url[]" class="col-md-1">URL</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control h-100" id="url_title[]"
                                                name="url_title[]" placeholder="Judul..." value="{{ $item->title }}"
                                                required>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control h-100" id="url[]" name="url[]"
                                                placeholder="URL..." value="{{ $item->url }}" required>
                                        </div>
                                        <div class="col-md-1">
                                            <a type="button" class="delete-url">
                                                <i class="menu-icon mdi mdi-window-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
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
                            @endif
                            <div class="text-end mt-3 url">
                                <button type="button" class="btn btn-outline-primary add-url">+ Tambah URL</button>
                            </div>

                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" value="1"
                                    @if ($product->is_active) checked @endif id="is_active" name="is_active">
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
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ url('') }}/admin-assets/js/image-resize.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/') }}/admin-assets/vendors/image-uploader/dist/image-uploader.min.js"></script>

    <script>
        var quill;
        $("#editor").length && (quill = new Quill("#editor", {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, !1]
                    }],
                    [{
                        font: []
                    }],
                    ["bold", "italic", "underline", "strike"],
                    [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }],
                    [{
                        color: []
                    }, {
                        background: []
                    }, {
                        align: []
                    }],
                    ["link", "image", "code-block", "video"]
                ],
                imageResize: {
                    displaySize: true
                },
            },
            placeholder: 'Deskripsi...',
            theme: "snow"
        }));

        quill.getModule('toolbar').addHandler('image', function() {
            var fileInput = document.createElement('input');
            fileInput.setAttribute('type', 'file');
            fileInput.setAttribute('accept', 'image/*');
            fileInput.click();

            fileInput.onchange = function() {
                var file = fileInput.files[0];
                var formData = new FormData();
                formData.append('image', file);

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/upload-image',
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        quill.focus();
                        const range = quill.getSelection();
                        quill.insertEmbed(range.index, 'image', data.file);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            };
        });

        document.getElementById('description').value = quill.root.innerHTML;
        quill.on('text-change', function() {
            document.getElementById('description').value = quill.root.innerHTML;
        });

        $.ajax({
            url: "/get-images/{{ $product->id }}?type=product",
            type: 'get',
            dataType: "json",
            success: function(data) {
                console.log(data)
                $('.input-images').imageUploader({
                    preloaded: data,
                    imagesInputName: 'galleries',
                    preloadedInputName: 'imagesold'
                });
            }
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
