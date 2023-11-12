@extends('layouts.main', ['title' => 'Selamat Datang! - Leaderhub'])

@section('styles')
    <style>
        .product-item {
            color: black;
        }

        .product-item:hover {
            background-color: #00CCD9;
            color: white;
        }
    </style>
@endsection

@section('content')
    <!-- Carousel -->
    <div id="leaderhub-carousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators mb-4">
            <button type="button" data-bs-target="#leaderhub-carousel" data-bs-slide-to="0" class="active"
                style="height: 10px; width: 60px; border-radius:5px;border-top: 0px; border-bottom:0px"></button>
            <button type="button" data-bs-target="#leaderhub-carousel" data-bs-slide-to="1"
                style="height: 10px; width: 60px;border-radius:5px;border-top: 0px; border-bottom:0px"></button>
            <button type="button" data-bs-target="#leaderhub-carousel" data-bs-slide-to="2"
                style="height: 10px; width: 60px;border-radius:5px;border-top: 0px; border-bottom:0px"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('/') }}/images/slides/1.jpg"
                    style="height: 100vh; width: 100%; object-fit:cover; object-position:top" alt="Los Angeles"
                    class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$"
                    style="height: 100vh; width: 100%; object-fit:cover; object-position:top" alt="Chicago" class="d-block"
                    style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/') }}/images/slides/1.jpg"
                    style="height: 100vh; width: 100%; object-fit:cover; object-position:top" alt="New York" class="d-block"
                    style="width:100%">
            </div>
        </div>
    </div>
    {{-- End Carousel --}}

    @if (count(@$product_categories ?? []))
        {{-- Products --}}
        <section class="container my-5">
            <h2 class="text-center mb-5">Product <span style="color: #00CCD9">Leaderhub</span></h2>
            <ul class="row p-0 d-flex justify-content-center" style="list-style: none">
                @foreach ($product_categories as $item)
                    <li class="col-md-3 col-12 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="product-item border rounded p-5 text-center fw-bold h-100">
                                {{ $item->name }}
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    @endif
@endsection
