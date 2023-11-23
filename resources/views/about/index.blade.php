@extends('layouts.main', ['title' => 'Tentang Kami - ' . get_company_name(), 'menu' => 'about'])

@section('meta')
    <meta name="title" content="Tentang Kami - {{ get_company_name() }}">
    <meta name="description" content="{{ get_company_description() }}">
    <meta name="keywords" content="tentang kami, {{ get_company_name() }}">

    <meta property="og:title" content="Tentang Kami - {{ get_company_name() }}" />
    <meta property="og:image" content="{{ get_logo() }}" />
@endsection

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
                <h1 class="h4 fw-bold">Tentang Kami</h1>
                <div class="text-center px-3 py-5">
                    <img src="{{ get_logo() }}" height="50" alt="logo leaderhub" />
                </div>
                <div class="ql-snow">
                    <div class="ql-editor" style="white-space:normal; padding-left: 0px; padding-right: 0px">
                        {!! $about->value !!}
                    </div>
                </div>
            </div>
        </div>
        @if (count(@$services ?? []))
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="row">
                        @foreach (@$services ?? [] as $item)
                            <div class="col-md-4 col-12 mb-5 text-start">
                                <img class="p-4" style="width: 150px"
                                    src="{{ asset('storage/' . @$item->media[0]->url) }}" alt="{{ @$item->media[0]->alt }}">
                                <h2 class="h6 fw-bold">{{ $item->title }}</h2>
                                <p style="font-size: 12px">{{ $item->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if (count(@$certificates ?? []))
        <div class="px-3 px-md-0 mb-4 py-5" style="background-color: #00CCD9">
            <div class="container py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-12">
                        <h2 class="h4 fw-bold text-center text-light mb-5">Sertifikasi</h2>
                        <div class="row d-flex justify-content-center">
                            @foreach ($certificates as $item)
                                <div class="col-md-3">
                                    <div class="w-100 bg-light">
                                        <img class="w-100" style="object-fit:contain"
                                            src="{{ asset('storage/' . @$item->media[0]->url) }}"
                                            alt="{{ @$item->media[0]->alt }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @include('shared.product_category', ['product_categories' => @$product_categories])
@endsection

@section('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endsection
