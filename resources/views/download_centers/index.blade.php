@extends('layouts.main', ['title' => 'Download Center - Leaderhub', 'menu' => 'download_centers'])

@section('content')
    <div class="container mt-5 pt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h1 class="h4 fw-bold">Download Center</h1>

                <div class="row">
                    <div class="col-md-6 col-12 text-center">
                        <i class="fa-brands fa-apple my-5" style="font-size: 150px"></i>
                        <h2 class="h5">For Windows User<br />Support Win 7/8/10+</h2>
                        <a href="#" class="btn btn-outline-primary rounded-pill mt-3" style="background-color: transparent; color:#00CCD9;
                        border-color: #00CCD9;">Driver Download</a>
                    </div>
                    <div class="col-md-6 col-12 text-center">
                        <i class="fa-brands fa-windows my-5" style="font-size: 150px"></i>
                        <h2 class="h5">For Windows User<br />Support Win 7/8/10+</h2>
                        <a href="#" class="btn btn-outline-primary rounded-pill mt-3" style="background-color: transparent; color:#00CCD9;
                        border-color: #00CCD9;">Driver Download</a>
                    </div>
                </div>
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
