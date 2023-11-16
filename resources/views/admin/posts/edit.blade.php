@extends('admin.layouts.main', ['title' => 'Edit Post', 'menu' => 'posts', 'submenu' => 'post-list'])

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Post</h4>
                        <form class="forms-sample" method="post" action="{{ route('post_edit', $post->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control h-100 @error('title') is-invalid @enderror"
                                    id="title" value="{{ old('title') ?? $post->title }}" name="title"
                                    placeholder="Post Title..." required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input type="file" class="form-control h-100 @error('image') is-invalid @enderror"
                                    name="image" id="image">
                                @if (count(@$post->media ?? []))
                                    <small><a href="{{ asset('storage/' . @$post->media[0]->url) }}">See feature
                                            image</a></small>
                                @endif
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div id="editor" class="mb-4" style="min-height: 600px">{!! old('description') ?? $post->body !!}</div>
                            <input type="hidden" name="description" id="description"
                                value="{{ old('description') ?? $post->body }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
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
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control h-100 @error('date') is-invalid @enderror"
                                            id="date"
                                            value="{{ old('date') ?? (@$post->published_at != null ? @$post->published_at->format('Y-m-d') : null) }}"
                                            name="date" placeholder="Post date..." required>
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
                                    Active
                                </label>
                            </div>

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

        document.getElementById('description').value = quill.root.innerHTML;
        quill.on('text-change', function() {
            document.getElementById('description').value = quill.root.innerHTML;
        });
    </script>
@endsection
