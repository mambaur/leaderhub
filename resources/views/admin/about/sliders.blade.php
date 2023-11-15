@extends('admin.layouts.main', ['title' => 'Carousel Slider', 'menu' => 'sliders', 'submenu' => 'sliders'])

@section('styles')
    <link type="text/css" rel="stylesheet"
        href="{{ url('/') }}/admin-assets/vendors/image-uploader/dist/image-uploader.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Carousel Sliders</h4>
                        <form class="forms-sample" method="post" action="{{ route('sliders_update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="input-images"></div>
                                </div>
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
    <script type="text/javascript" src="{{ url('/') }}/admin-assets/vendors/image-uploader/dist/image-uploader.min.js">
    </script>

    <script>
        $.ajax({
            url: "/get-images/sliders",
            type: 'get',
            dataType: "json",
            success: function(data) {
                $('.input-images').imageUploader({
                    preloaded: data,
                    imagesInputName: 'images',
                    preloadedInputName: 'imagesold'
                });
            }
        })
    </script>
@endsection
