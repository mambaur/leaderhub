@extends('admin.layouts.main', ['title' => 'Create Download Center', 'menu' => 'download-centers', 'submenu' => 'download-center-create'])

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Download Center</h4>
                        <form class="forms-sample" method="post" action="{{route('download_center_store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control h-100 @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" name="name"
                                    placeholder="Title..." required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="url">Url</label>
                                <input type="text" class="form-control h-100 @error('url') is-invalid @enderror" id="url" value="{{old('url')}}" name="url"
                                    placeholder="URL..." required>
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Icon</label>
                                <input type="file" class="form-control h-100 @error('image') is-invalid @enderror" name="image" id="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="url">Description</label>
                                <textarea name="description" id="description" class="form-control h-100 @error('description') is-invalid @enderror" rows="5" placeholder="Description...">{{old('description')}}</textarea>
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
