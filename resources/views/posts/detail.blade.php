@extends('layouts.main', ['title' => 'Berita - ' . get_company_name(), 'menu' => 'posts'])

@section('meta')
    <meta name="title" content="{{ $post->title }}">
    <meta name="description" content="{{ get_company_description() }}">
    <meta name="keywords" content="garansi, {{ get_company_name() }}">

    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:image" content="{{ asset('storage/' . @$post->media[0]->url) }}" />
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
                <span class="h4 fw-bold">Berita</span>
                <div class="text-center py-3">
                    <img class="w-100 rounded" src="{{ asset('storage/' . @$post->media[0]->url) }}"
                        alt="{{ @$post->media[0]->alt }}" />
                </div>
                <h1 class="h4 fw-bold">{{ $post->title }}</h1>
                <div class="text-muted mb-3" style="font-style: italic; font-size: 14px">
                    {{ @$post->published_at != null ? @$post->published_at->format('d F Y') : '' }}</div>
                <div class="ql-snow">
                    <div class="ql-editor" style="white-space:normal; padding-left: 0px; padding-right: 0px">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.product_category', ['product_categories' => @$product_categories])
@endsection

@section('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endsection
