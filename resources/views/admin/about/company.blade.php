@extends('admin.layouts.main', ['title' => 'Perusahaan', 'menu' => 'company', 'submenu' => null])

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tentang Perusahaan</h4>
                        <form class="forms-sample" method="post" action="{{ route('company_store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama Perusahaan</label>
                                <input type="text" class="form-control h-100 @error('name') is-invalid @enderror"
                                    id="name" value="{{ old('name') ?? @$name->value }}" name="name"
                                    placeholder="Nama perusahaan..." required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Logo</label>
                                @if (@$logo->media[0])
                                    <div class="my-3">
                                        <img style="width: 80px" src="{{ asset('storage/' . @$logo->media[0]->url) }}"
                                            alt="{{ @$logo->media[0]->alt }}">
                                    </div>
                                @endif
                                <input type="file" class="form-control h-100 @error('image') is-invalid @enderror"
                                    name="image" id="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mini_image">Mini Logo</label>
                                @if (@$mini_logo->media[0])
                                    <div class="my-3">
                                        <img style="width: 80px" src="{{ asset('storage/' . @$mini_logo->media[0]->url) }}"
                                            alt="{{ @$mini_logo->media[0]->alt }}">
                                    </div>
                                @endif
                                <input type="file" class="form-control h-100 @error('mini_image') is-invalid @enderror"
                                    name="mini_image" id="mini_image">
                                @error('mini_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div id="editor" class="mb-4" style="min-height: 600px">{!! @$company->value !!}</div>
                            <input type="hidden" name="description" id="description" value="{{ @$company->value }}">

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

        quill.on('text-change', function() {
            document.getElementById('description').value = quill.root.innerHTML;
        });
    </script>
@endsection
