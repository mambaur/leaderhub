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
                    <img src="{{ get_logo() }}" height="24" alt="Logo Leaderhub" />
                </h2>
                <div class="row d-flex justify-content-center">
                    @foreach (get_product_categories() as $item)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4 position-relative">
                            <a href="#" class="text-decoration-none"
                                @if (count(@$item->products ?? [])) data-bs-toggle="dropdown"
                                aria-expanded="false" @endif>
                                <div class="product-item border rounded text-center fw-bold d-flex align-items-center justify-content-center"
                                    style="height: 100px">
                                    {{ $item->name }}
                                </div>
                            </a>
                            @if (count(@$item->products ?? []))
                                <ul class="dropdown-menu w-75">
                                    @foreach ($item->products as $row)
                                        <li><a class="dropdown-item"
                                                href="{{ route('product_show', @$row->slug) }}">{{ @$row->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
