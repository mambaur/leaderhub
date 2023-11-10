@extends('admin.layouts.main', ['title' => 'Edit Guarantee', 'menu' => 'guarantees', 'submenu' => 'guarantee-list'])

@section('styles')
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/css/jquery/jquery-ui.theme.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/css/jquery/jquery-ui.min.css" />
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Guarantee</h4>
                        <form class="forms-sample" method="post" action="{{ route('guarantee_update', $guarantee->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="product_name">Search Product Name</label>
                                <input type="text" class="form-control h-100 @error('product_name') is-invalid @enderror"
                                    id="product_name" value="{{ old('product_name') ?? @$guarantee->product->name }}"
                                    name="product_name" placeholder="Product Name..." required>
                                <input type="hidden" id="product_id" name="product_id"
                                    value="{{ old('product_id') ?? @$guarantee->product->id }}">
                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="serial_number">Serial Number</label>
                                        <input type="text"
                                            class="form-control h-100 @error('serial_number') is-invalid @enderror"
                                            id="serial_number"
                                            value="{{ old('serial_number') ?? @$guarantee->serial_number }}"
                                            name="serial_number" placeholder="Serial Number..." required>
                                        @error('serial_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="period">Guarantee Period</label>
                                        <input type="text"
                                            class="form-control h-100 @error('period') is-invalid @enderror" id="period"
                                            value="{{ old('period') ?? @$guarantee->period }}" name="period"
                                            placeholder="Ex. 1 Year" required>
                                        @error('period')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="purchase_date">Purchase Date</label>
                                        <input type="date"
                                            class="form-control h-100 @error('purchase_date') is-invalid @enderror"
                                            id="purchase_date"
                                            value="{{ old('purchase_date') ?? @$guarantee->purchase_date }}"
                                            name="purchase_date" placeholder="Purchase Date..." required>
                                        @error('purchase_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expired_date">Expired Date</label>
                                        <input type="date"
                                            class="form-control h-100 @error('expired_date') is-invalid @enderror"
                                            id="expired_date"
                                            value="{{ old('expired_date') ?? @$guarantee->expired_date }}"
                                            name="expired_date" placeholder="Expired Date..." required>
                                        @error('expired_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('/') }}/admin-assets/js/jquery-ui.min.js"></script>
    <script>
        urlagent = "{{ route('product_data') }}"
        $('#product_name').autocomplete({
            change: function(event, ui) {
                console.log($('#product_name').val())
            },
            source: function(request, response) {
                $.ajax({
                    url: urlagent,
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.length == 0) {
                            $('#product_id').val("");
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                if (ui.item.id != null) {
                    $('#product_id').val(ui.item.id)
                    $(this).val(ui.item.value);
                } else {
                    $('#product_id').val("")
                    $(this).val("");
                }
                return false;
            },
        });
    </script>
@endsection
