@if (count(@$product_categories ?? []))
    {{-- Products --}}
    <section class="container my-5">
        <div class="row d-flex align-items-center">
            <div class="col-12">
                <h2 class="text-center mb-5 d-flex align-items-center justify-content-center">
                    <span class="me-3">
                        Product
                    </span>
                    <img src="{{ url('/') }}/admin-assets/images/leaderhub/logo.png" height="24"
                        alt="Logo Leaderhub" />
                </h2>
                <ul class="row p-0 d-flex justify-content-center" style="list-style: none">
                    @foreach ($product_categories as $item)
                        <li class="col-md-3 col-12 mb-4">
                            <a href="" class="text-decoration-none">
                                <div class="product-item border rounded p-5 text-center fw-bold h-100">
                                    {{ $item->name }}
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
