@extends('admin.layouts.main', ['title' => 'Tambah Layanan', 'menu' => 'services', 'submenu' => 'service-create'])

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Layanan</h4>
                        <form class="forms-sample" method="post" action="{{ route('service_store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control h-100 @error('title') is-invalid @enderror"
                                    id="title" value="{{ old('title') }}" name="title" placeholder="Judul..."
                                    required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Icon</label>
                                <input type="file" class="form-control h-100 @error('image') is-invalid @enderror"
                                    name="image" id="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="url">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control h-100 @error('description') is-invalid @enderror"
                                    rows="5" placeholder="Deskripsi...">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
