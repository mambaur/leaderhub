@extends('layouts.main', ['title' => 'Product - ' . get_company_name(), 'menu' => 'products'])

@section('meta')
    <meta name="title" content="{{ @$product->name }}">
    <meta name="description" content="{{ get_company_description() }}">
    <meta name="keywords" content="berita, {{ get_company_name() }}">

    <meta property="og:title" content="{{ @$product->name }}" />
    <meta property="og:image" content="{{ get_logo() }}" />
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .mySwiper2 {
            height: 80%;
            width: 100%;
        }

        .mySwiper {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .mySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-button-prev::after,
        .swiper-button-next::after {
            display: none;
        }
    </style>
@endsection


@section('content')
    <div class="container mt-5 pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <div class="d-flex align-items-center">
                    <img class="mb-2" src="{{ get_logo() }}" height="24" alt="Logo Leaderhub" />
                    <i class="fa-solid fa-chevron-right mx-3 d-none d-md-block" style="color: #00CCD9"></i>
                    <h1 class="h4 fw-bold d-inline-block mt-1 d-none d-md-block">{{ @$product->product_category->name }}
                    </h1>
                    <i class="fa-solid fa-chevron-right mx-md-3 mx-2" style="color: #00CCD9"></i>
                    <h1 class="h4 fw-bold d-inline-block mt-1">{{ @$product->name }}</h1>
                </div>

                @if (count(@$product->media ?? []))
                    <div class="w-100 my-4">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                            class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @foreach ($product->media as $item)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/' . @$item->url) }}" alt="{{ @$item->alt }}"
                                            title="{{ @$item->title }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if (count(@$product->media ?? []) > 1)
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($product->media as $item)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/' . @$item->url) }}" alt="{{ @$item->alt }}"
                                                title="{{ @$item->title }}" />
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next">
                                    <i class="fa-solid fa-chevron-right" style="color: #0A9AA4"></i>
                                </div>
                                <div class="swiper-button-prev">
                                    <i class="fa-solid fa-chevron-left" style="color: #0A9AA4"></i>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                @if (@$product->gallery_description)
                    <p class="h5 fw-bold text-center fst-italic mb-4">{{ @$product->gallery_description }}</p>
                @endif
                {{-- <h2 class="h4 fw-bold">{{ @$product->name }}</h2> --}}

                {!! @$product->description !!}

                @if (count(@$product->urls ?? []))
                    <div class="w-100 d-flex justify-content-center">
                        <div class="mt-4">
                            @foreach ($product->urls as $item)
                                <a class="btn btn-primary rounded-0 border-0 me-2 mb-3" href="{{ $item->url }}"
                                    style="background-color: #00CCD9">{{ $item->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('shared.product_category')
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 6,
            freeMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
@endsection
