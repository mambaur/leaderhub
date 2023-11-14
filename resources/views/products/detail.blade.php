@extends('layouts.main', ['title' => 'Product - Leaderhub', 'menu' => 'products'])


@section('content')
    <div class="container mt-5 pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <div class="d-flex align-items-center">
                    <img class="mb-1"
                        src="{{ url('/') }}/admin-assets/images/leaderhub/logo.png" height="24"
                        alt="Logo Leaderhub" />
                    <i class="fa-solid fa-chevron-right mx-3" style="color: #00CCD9"></i>
                    <h1 class="h4 fw-bold d-inline-block">Products</span>
                </div>
                
                <div class="w-100">
                    
                </div>
                
                <h1 class="h4 fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
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
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-12">
            @include('shared.product_category', ['product_categories' => @$product_categories])
        </div>
    </div>
@endsection
