@extends('layouts.main', ['title' => 'Product - Leaderhub', 'menu' => 'products'])

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
                    <i class="fa-solid fa-chevron-right mx-3" style="color: #00CCD9"></i>
                    <h1 class="h4 fw-bold d-inline-block mt-1">Products</span>
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
                    </div>
                @endif

                @if (@$product->gallery_description)
                    <p class="h5 text-muted text-center fst-italic mb-4">{{ @$product->gallery_description }}</p>
                @endif
                <h2 class="h4 fw-bold">{{ @$product->name }}</h2>
                <div class="ql-snow">
                    <div class="ql-editor" style="white-space:normal; padding-left: 0px; padding-right: 0px">
                        {!! @$product->description !!}
                    </div>
                </div>

                @if (count(@$product->urls ?? []))
                    <div class="w-100 d-flex justify-content-center">
                        <div class="mt-4">
                            @foreach ($product->urls as $item)
                                <a class="btn btn-primary rounded-0 border-0 me-2" href="{{ $item->url }}"
                                    style="background-color: #00CCD9">{{ $item->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-12">
            @include('shared.product_category', ['product_categories' => @$product_categories])
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

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
