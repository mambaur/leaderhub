@extends('layouts.main', ['title' => 'Selamat Datang! - Leaderhub', 'menu' => 'dashboard'])

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

    @include('shared.product_category', ['product_categories' => @$product_categories])

    @include('shared.jumbotron')

    <article class="container my-5">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 col-12 pe-md-5 pe-0">
                <h2>Berita</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus consequuntur magnam
                    quis, labore
                    molestias sint veniam quibusdam aperiam, accusamus sequi, cum dolore repudiandae illo nam delectus?
                    Dolorem
                    ipsam, provident facere quidem tempore voluptate voluptatem esse nihil eos, incidunt mollitia iste.</p>
                <div class="text-muted mb-3" style="font-style: italic; font-size: 14px">12 Agustus 2023</div>
                <a href="" class="btn btn-primary rounded-0 border-0" style="background-color: #00CCD9">Baca
                    Selengkapnya</a>
            </div>
            <div class="col-md-6 col-12 p-3">
                <img class="w-100 rounded"
                    src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" alt="" />
            </div>
        </div>
    </article>
@endsection
