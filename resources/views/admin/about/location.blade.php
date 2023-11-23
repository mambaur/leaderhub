@extends('admin.layouts.main', ['title' => 'Lokasi', 'menu' => 'locations', 'submenu' => null])

@section('content')
    <div class="content-wrapper">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lokasi</h4>
                        <form class="forms-sample" method="post" action="{{ route('location_store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="contact">Kontak</label>
                                <input type="text" class="form-control h-100 @error('contact') is-invalid @enderror"
                                    id="contact" value="{{ old('contact') ?? @$contact->value }}" name="contact"
                                    placeholder="Kontak..." required>
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control h-100 @error('address') is-invalid @enderror"
                                    id="address" value="{{ old('address') ?? @$address->value }}" name="address"
                                    placeholder="Alamat..." required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="map">Map URL (Embed)</label>
                                <input type="text" class="form-control h-100 @error('map') is-invalid @enderror"
                                    id="map" value="{{ old('map') ?? @$map->value }}" name="map"
                                    placeholder="Map URL..." required>
                                <small>Example: <span
                                        class="text-muted fw-bold fst-italic">{{ '<iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>' }}</span>
                                </small>
                                @error('map')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
