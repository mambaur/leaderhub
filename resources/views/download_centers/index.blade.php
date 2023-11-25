@extends('layouts.main', ['title' => 'Download Center - ' . get_company_name(), 'menu' => 'download_centers'])

@section('meta')
    <meta name="title" content="Download Center - {{ get_company_name() }}">
    <meta name="description" content="{{ get_company_description() }}">
    <meta name="keywords" content="download center, {{ get_company_name() }}">

    <meta property="og:title" content="Download Center - {{ get_company_name() }}" />
    <meta property="og:image" content="{{ get_logo() }}" />
@endsection

@section('content')
    <div class="container mt-5 pt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h1 class="h4 fw-bold">Download Center</h1>

                <div class="row">
                    @foreach (@$downloads ?? [] as $item)
                        <div class="col-md-6 col-12 text-center">
                            <img class="my-4" src="{{ asset('storage/' . @$item->media[0]->url) }}"
                                alt="{{ @$item->media[0]->alt }}">
                            {{-- <i class="fa-brands fa-apple my-5" style="font-size: 150px"></i> --}}
                            <h2 class="h5">{{ $item->name }}<br />{{ $item->description }}</h2>
                            <a href="{{ $item->url }}" class="btn btn-outline-primary rounded-pill mt-3"
                                style="background-color: transparent; color:#00CCD9;
                            border-color: #00CCD9;">Driver
                                Download</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('shared.jumbotron')

    @include('shared.product_category')
@endsection
