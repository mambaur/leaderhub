@extends('layouts.main', ['title' => 'Product - Leaderhub', 'menu' => 'products'])

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
                    <img class="mb-1" src="{{ url('/') }}/admin-assets/images/leaderhub/logo.png" height="24"
                        alt="Logo Leaderhub" />
                    <i class="fa-solid fa-chevron-right mx-3" style="color: #00CCD9"></i>
                    <h1 class="h4 fw-bold d-inline-block">Products</span>
                </div>

                <div class="w-100 my-4">
                    <!-- Swiper -->
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" />
                            </div>
                        </div>
                        <div class="swiper-button-next">
                            <i class="fa-solid fa-chevron-right" style="color: #0A9AA4"></i>
                        </div>
                        <div class="swiper-button-prev">
                            <i class="fa-solid fa-chevron-left" style="color: #0A9AA4"></i>
                        </div>
                    </div>
                </div>

                <p class="h5 text-muted text-center fst-italic mb-4">Lorem ipsum dolor sit amet consectetur adipisicing
                    elit</p>
                <h2 class="h4 fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit</h2>
                <div class="text-muted mb-3" style="font-style: italic; font-size: 14px">12 Agustus 2023</div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi vero, ducimus, excepturi fuga
                    explicabo
                    maxime, est omnis iusto unde dolorem modi veritatis magni nesciunt neque alias eos quam! Reiciendis
                    consequuntur
                    ex quo? Dolorum eum repellat tenetur voluptatibus, error dolores laudantium sint aut illum fugiat dolore
                    harum
                    ullam sed, recusandae deserunt mollitia eveniet nobis magni blanditiis id ducimus inventore iusto ipsam.
                    Ab,
                    illum similique. Cum distinctio pariatur dolor fuga inventore facere voluptatem earum similique! Aliquam
                    mollitia dicta nobis libero enim corrupti eius repellendus magni ut facilis laborum id sunt veniam ipsum
                    cupiditate, omnis explicabo veritatis distinctio! Architecto esse aperiam sunt exercitationem.
                </p>

                <div class="w-100 d-flex justify-content-center">
                    <div class="mt-4">
                        <button class="btn btn-primary rounded-0 border-0 me-2" style="background-color: #00CCD9">Download
                            PDF</button>
                        <button class="btn btn-primary rounded-0 border-0 me-2" style="background-color: #00CCD9">Download
                            PDF</button>
                    </div>
                </div>
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
