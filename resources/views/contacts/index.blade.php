@extends('layouts.main', ['title' => 'Kontak Kami - Leaderhub', 'menu' => 'contacts'])

@section('content')
    <div class="container mt-5 pt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h1 class="h4 fw-bold">Kontak Kami</h1>
                <div class="text-center py-3">
                    <div id="map-container-google-1" class="z-depth-1-half map-container">
                        <iframe src="{{ @$src }}" frameborder="0" style="border:0" width="100%" height="500px"
                            allowfullscreen></iframe>
                    </div>
                    {{-- <img class="w-100 rounded"
                        src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" alt="" /> --}}
                </div>
                <p class="text-center mb-4">
                    {{ @$company['address'][0]->value }}
                </p>
                <h2 class="text-center h4 fw-bold">
                    Layanan Pelanggan
                </h2>
                <p class="text-center">
                    {{ @$company['contact'][0]->value }}
                </p>
            </div>
        </div>
    </div>

    @include('shared.jumbotron')

    @include('shared.product_category', ['product_categories' => @$product_categories])
@endsection
