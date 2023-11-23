@extends('admin.layouts.main', ['title' => 'Tambah Kategori Produk', 'menu' => 'categories', 'submenu' => 'product-category-create'])

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Kategori</h4>
                        <form class="forms-sample" method="post" action="{{ route('product_category_store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control h-100 @error('name') is-invalid @enderror"
                                    id="name" value="{{ old('name') }}" name="name" placeholder="Nama Kategori..."
                                    required>
                                @error('name')
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
