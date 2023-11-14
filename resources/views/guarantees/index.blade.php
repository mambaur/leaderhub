@extends('layouts.main', ['title' => 'Garansi - Leaderhub', 'menu' => 'guarantees'])

@section('content')
    <div class="container mt-5 pt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h1 class="h4 fw-bold mb-4">Garansi</h1>

                <div class="row mb-5">
                    <div class="col-md-12 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text rounded-0 bg-dark text-light py-3 px-5" id="serial">Serial Number :</span>
                            <input type="text" class="form-control rounded-0 py-3 text-end" id="serial_number" aria-describedby="serial" placeholder="Masukkan serial number produk anda disini...">
                        </div>
                        <div class="w-100 text-end">
                            <button class="btn btn-primary rounded-0 border-0" style="background-color: #00CCD9">Cek Sekarang</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="py-3 px-4">
                                        <img class="px-2" src="{{ url('/') }}/admin-assets/images/leaderhub/logo.png" height="24" alt="Logo Leaderhub" />
                                    </th>
                                    <th scope="col" class="w-50 text-end py-3 px-4" style="font-size: 18px">734320473583757</th>
                                  </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-5 py-3" scope="row">Nama Produk</td>
                                    <td class="px-5 py-3">Mark</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3" scope="row">Tanggal Pembelian</td>
                                    <td class="px-5 py-3">7 Agustus 2024</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3" scope="row">Masa Garansi</td>
                                    <td class="px-5 py-3">1 Tahun</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3" scope="row">Garansi Berakhir</td>
                                    <td class="px-5 py-3">7 Agustus 2024</td>
                                </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
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
