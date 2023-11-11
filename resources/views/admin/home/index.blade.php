@extends('admin.layouts.main', ['title' => 'Dashboard Leaderhub Administrator', 'menu' => 'dashboard'])

@section('styles')
    <style>
        @media (max-width: 767.98px) {
            .images {
                width: 100%;
            }
        }

        @media (min-width: 767.98px) {
            .images {
                width: 600px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="images">
                                            <img src="{{ url('/') }}/admin-assets/images/leaderhub/dashboard.png"
                                                alt="Dashboard leaderhub" class="w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-sm-12">
                                    <div class="statistics-details d-flex align-items-start justify-content-center gap-5">
                                        <div>
                                            <p class="statistics-title">Total Products</p>
                                            <h3 class="rate-percentage">{{ @$total_products }}</h3>
                                        </div>
                                        <div>
                                            <p class="statistics-title">Total Posts</p>
                                            <h3 class="rate-percentage">{{ @$total_posts }}</h3>
                                            </p>
                                        </div>
                                        <div>
                                            <p class="statistics-title">Total Guarantees</p>
                                            <h3 class="rate-percentage">{{ @$total_guarantees }}</h3>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
