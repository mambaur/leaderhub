@extends('admin.layouts.main', ['title' => 'Perusahaan', 'menu' => 'company', 'submenu' => null])

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

                            <div class="mb-4">
                                <textarea name="description" id="summernote" style="display: none;">{!! @$company->value !!}</textarea>
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
