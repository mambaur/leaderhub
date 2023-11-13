@extends('layouts.main', ['title' => 'Tentang Kami - Leaderhub', 'menu' => 'about'])

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
                <h1 class="h4 fw-bold">Tentang Kami</h1>
                <div class="text-center px-3 py-5">
                    <img src="{{ url('/') }}/admin-assets/images/leaderhub/logo.png" height="50" alt="logo" />
                </div>
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
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h2 class="h6 fw-bold">Pengalaman Teknis</h2>
                        <p style="font-size: 12px">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ex nam
                            fugiat.</p>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h2 class="h6 fw-bold">Pengalaman Teknis</h2>
                        <p style="font-size: 12px">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ex nam
                            fugiat.</p>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h2 class="h6 fw-bold">Pengalaman Teknis</h2>
                        <p style="font-size: 12px">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ex nam
                            fugiat.</p>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h2 class="h6 fw-bold">Pengalaman Teknis</h2>
                        <p style="font-size: 12px">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ex nam
                            fugiat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-5 mb-4" style="background-color: #00CCD9">
        <div class="container py-4">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-12">
                    <h2 class="h4 fw-bold text-center text-light mb-5">Sertifikasi</h2>
                    <div class="row d-flex justify-content-center">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="col-md-2">
                                <div class="w-100 bg-light" style="height: 200px"></div>
                            </div>
                        @endfor
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
