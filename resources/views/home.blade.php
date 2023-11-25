@extends('layouts.main', ['title' => 'Selamat Datang! - ' . get_company_name(), 'menu' => 'dashboard'])

@section('meta')
    <meta name="title" content="Selamat Datang! - {{ get_company_name() }}">
    <meta name="description" content="{{ get_company_description() }}">
    <meta name="keywords" content="landing page, beranda, {{ get_company_name() }}">

    <meta property="og:title" content="Selamat Datang! - {{ get_company_name() }}" />
    <meta property="og:image" content="{{ asset('storage/' . @$company['sliders'][0]->media[0]->url) }}" />
@endsection

@section('content')
    <!-- Carousel -->
    <div id="leaderhub-carousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators mb-4">
            @foreach (@$company['sliders'][0]->media ?? [] as $key => $item)
                <button type="button" data-bs-target="#leaderhub-carousel" data-bs-slide-to="{{ $key }}"
                    class="@if ($key == 0) active @endif"
                    style="height: 10px; width: 60px; border-radius:5px;border-top: 0px; border-bottom:0px"></button>
            @endforeach
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            @foreach (@$company['sliders'][0]->media ?? [] as $key => $item)
                <div class="carousel-item @if ($key == 0) active @endif">
                    <img src="{{ asset('storage/' . @$item->url) }}"
                        style="height: 100vh; width: 100%; object-fit:cover; object-position:top" alt="Los Angeles"
                        class="d-block" style="width:100%">
                </div>
            @endforeach
        </div>
    </div>
    {{-- End Carousel --}}

    @include('shared.product_category')

    @include('shared.jumbotron')

    @if (@$post)
        <article class="container my-5">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 col-12 pe-md-5 pe-0 order-md-1 order-2 mb-4">
                    <h2>{{ @$post->title }}</h2>
                    <p>{!! \Illuminate\Support\Str::limit(@$post->body ? strip_tags($post->body) : '', 200) !!}</p>
                    <div class="text-muted mb-3" style="font-style: italic; font-size: 14px">
                        {{ @$post->published_at != null ? @$post->published_at->format('d F Y') : '' }}</div>
                    <a href="{{ route('show_post', $post->slug) }}" class="btn btn-primary rounded-0 border-0"
                        style="background-color: #00CCD9">Baca
                        Selengkapnya</a>
                </div>
                <div class="col-md-6 col-12 p-3 order-md-2 order-1 mb-4">
                    <img class="w-100 rounded"
                        src="{{ @$post->media[0] ? asset('storage/' . @$post->media[0]->url) : url('/') . '/images/empty.jpg' }}"
                        alt="{{ @$post->media[0]->alt ?? @$post->title }}" />
                </div>
            </div>
        </article>
    @endif
@endsection
