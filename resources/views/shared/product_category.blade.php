@if (count(@$product_categories ?? []))
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

    {{-- Products --}}
    <section class="container my-5 py-5">
        <div class="row d-flex align-items-center">
            <div class="col-12">
                <h2 class="text-center mb-5 d-flex align-items-center justify-content-center">
                    <span class="me-3">
                        Product
                    </span>
                    <img src="{{ url('/') }}/admin-assets/images/leaderhub/logo.png" height="24"
                        alt="Logo Leaderhub" />
                </h2>
                <div class="row d-flex justify-content-center">
                    @foreach ($product_categories as $item)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                            <a href="" class="text-decoration-none">
                                <div class="product-item border rounded text-center fw-bold d-flex align-items-center justify-content-center"
                                    style="height: 100px">
                                    {{ $item->name }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
