@extends('layouts.main', ['title' => 'Kontak Kami - Leaderhub', 'menu' => 'contacts'])

@section('content')
    <div class="container mt-5 pt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h1 class="h4 fw-bold">Kontak Kami</h1>
                <div class="text-center py-3">
                    <img class="w-100 rounded"
                        src="https://image.benq.com/is/image/benqco/re01-teach-your-way?$ResponsivePreset$" alt="" />
                </div>
                <p class="text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi vero, ducimus, excepturi fuga
                    explicabo
                    maxime, est omnis iusto unde dolorem modi veritatis magni nesciunt neque alias eos quam! Reiciendis
                    consequuntur
                    ex quo? Dolorum eum repellat tenetur voluptatibus, error dolores laudantium sint aut illum fugiat dolore
                    harum
                </p>
                <p class="text-center fw-bold">
                    Layanan Pelanggan
                </p>
                <p class="text-center">
                    +62 813-3010-2880
                </p>
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
