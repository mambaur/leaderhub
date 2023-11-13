@extends('layouts.main', ['title' => 'Berita - Leaderhub', 'menu' => 'posts'])

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
    <div class="container mt-5 pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h1 class="h4 fw-bold">Berita</h1>
                @for ($i = 0; $i < 10; $i++)
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-md-4">
                            <div class="text-center py-3">
                                <img class="w-100 rounded"
                                    src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$"
                                    alt="" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h2 class="h5 fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit</h2>
                            <div class="text-muted mb-1" style="font-style: italic; font-size: 14px">12 Agustus 2023</div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi vero, ducimus, excepturi
                                fuga
                                explicabo
                            </p>

                            <a href="" class="btn btn-primary rounded-0 border-0"
                                style="background-color: #00CCD9">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                @endfor

            </div>
        </div>
    </div>

    @include('shared.jumbotron')

    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-12">
            @include('shared.product_category', ['product_categories' => @$product_categories])
        </div>
    </div>
@endsection
