@extends('admin.layouts.main', ['title' => @$product_category->name ?? '', 'menu' => 'categories', 'submenu' => 'product-category-list'])

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Category</h4>
                        <form class="forms-sample" method="post" action="{{route('product_category_update', @$product_category->id)}}">
                            @csrf
                            @method("put")
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control h-100 @error('name') is-invalid @enderror" id="name" value="{{ old('name') ?? @$product_category->name}}" name="name"
                                    placeholder="Category Name..." required>
                                    @error('name')
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
