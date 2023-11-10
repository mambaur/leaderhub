@extends('admin.layouts.main', ['title' => @$certificate->title ?? 'Edit Certificate', 'menu' => 'certificates', 'submenu' => 'certificate-list'])

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Certificate</h4>
                        <form class="forms-sample" method="post" enctype="multipart/form-data"
                            action="{{ route('certificate_update', @$certificate->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control h-100 @error('title') is-invalid @enderror"
                                    id="title" value="{{ old('title') ?? @$certificate->title }}" name="title"
                                    placeholder="Title..." required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Icon</label>
                                @if (@$certificate->media[0])
                                    <div class="my-3">
                                        <img style="width: 80px"
                                            src="{{ asset('storage/' . @$certificate->media[0]->url) }}"
                                            alt="{{ @$certificate->media[0]->alt }}">
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
                                <label for="url">Description</label>
                                <textarea name="description" id="description" class="form-control h-100 @error('description') is-invalid @enderror"
                                    rows="5" placeholder="Description...">{{ old('description') ?? @$certificate->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
