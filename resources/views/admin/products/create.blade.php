@extends('admin.layouts.main', ['title' => 'Create Product', 'menu' => 'products', 'submenu' => 'product-create'])

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet"
        href="{{ url('/') }}/admin-assets/vendors/image-uploader/dist/image-uploader.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Product</h4>
                        <form class="forms-sample" method="post" action="{{ route('product_store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control h-100 @error('name') is-invalid @enderror"
                                    id="name" value="{{ old('name') }}" name="name" placeholder="Product Name..."
                                    required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="product_category_id">Category</label>
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

                            <div id="editor" class="mb-4" style="min-height: 400px"></div>
                            <input type="hidden" name="description" id="description" value="">

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
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
    <script type="text/javascript" src="{{ url('/') }}/admin-assets/vendors/image-uploader/dist/image-uploader.min.js">
    </script>

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
            placeholder: 'Description...',
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

        quill.on('text-change', function() {
            console.log(quill.root.innerHTML)
            document.getElementById('description').value = quill.root.innerHTML;
        });

        $('.input-images').imageUploader({
            imagesInputName: 'galleries',
        })
    </script>
@endsection
