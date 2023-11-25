@extends('layouts.main', ['title' => 'Garansi - ' . get_company_name(), 'menu' => 'guarantees'])

@section('meta')
    <meta name="title" content="Garansi - {{ get_company_name() }}">
    <meta name="description" content="{{ get_company_description() }}">
    <meta name="keywords" content="garansi, {{ get_company_name() }}">

    <meta property="og:title" content="Garansi - {{ get_company_name() }}" />
    <meta property="og:image" content="{{ get_logo() }}" />
@endsection

@section('content')
    <div class="container mt-5 pt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h1 class="h4 fw-bold mb-4">Garansi</h1>

                <div class="row mb-5">
                    <div class="col-md-12 col-12">
                        <form action="{{ route('guarantees') }}" method="get">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text rounded-0 bg-dark text-light py-3 px-md-5 px-3"
                                    id="serial">Serial
                                    Number
                                    :</span>
                                <input type="text" class="form-control rounded-0 py-3 text-end" id="serial_number"
                                    value="{{ @$serial_number }}" aria-describedby="serial" name="serial_number"
                                    placeholder="Masukkan serial number produk anda disini" required>
                            </div>
                            <div class="w-100 text-end">
                                <button type="submit" class="btn btn-primary rounded-0 border-0"
                                    style="background-color: #00CCD9">Cek
                                    Sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>
                @if (@$guarantee)
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="py-3 px-4">
                                            <img class="px-2" src="{{ get_logo() }}" height="24"
                                                alt="Logo Leaderhub" />
                                        </th>
                                        <th scope="col" class="w-50 text-end py-3 px-4" style="font-size: 18px">
                                            {{ @$guarantee->serial_number }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-5 py-3" scope="row">Nama Produk</td>
                                        <td class="px-5 py-3">{{ @$guarantee->product->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-3" scope="row">Tanggal Pembelian</td>
                                        <td class="px-5 py-3">
                                            {{ @$guarantee->purchase_date != null ? @$guarantee->purchase_date->format('d F Y') : '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-3" scope="row">Masa Garansi</td>
                                        <td class="px-5 py-3">{{ @$guarantee->period }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-3" scope="row">Garansi Berakhir</td>
                                        <td class="px-5 py-3">
                                            {{ @$guarantee->expired_date != null ? @$guarantee->expired_date->format('d F Y') : '' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif(@$serial_number)
                    <div class="alert alert-primary d-flex align-items-center rounded-0 border-0" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                            <use xlink:href="#info-fill" />
                        </svg>
                        <div class="ms-3">
                            Maaf, Serial Number tidak ditemukan!
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('shared.jumbotron')

    @include('shared.product_category')
@endsection
