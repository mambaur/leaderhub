@extends('layouts.main', ['title' => 'Berita - ' . get_company_name(), 'menu' => 'posts'])

@section('meta')
    <meta name="title" content="Berita - {{ get_company_name() }}">
    <meta name="description" content="{{ get_company_description() }}">
    <meta name="keywords" content="berita, {{ get_company_name() }}">

    <meta property="og:title" content="Berita - {{ get_company_name() }}" />
    <meta property="og:image" content="{{ get_logo() }}" />
@endsection

@section('content')
    <div class="container mt-5 pt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h1 class="h4 fw-bold">Berita</h1>
                @foreach ($posts as $item)
                    <div class="row d-flex align-items-start mb-4 mt-4">
                        <div class="col-md-4">
                            <div class="text-center pt-1">
                                <img class="w-100 rounded"
                                    src="{{ @$item->media[0]->url ? asset('storage/' . @$item->media[0]->url) : url('/') . '/images/empty.jpg' }}"
                                    alt="{{ @$item->media[0]->alt ?? $item->title }}" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h2 class="h5 fw-bold">{{ $item->title }}</h2>
                            <div class="text-muted mb-1" style="font-style: italic; font-size: 14px">
                                {{ @$item->published_at != null ? @$item->published_at->format('d F Y') : '' }}</div>
                            <p>
                                {!! \Illuminate\Support\Str::limit(@$item->body ? strip_tags($item->body) : '', 130) !!}
                            </p>

                            <a href="{{ route('show_post', $item->slug) }}" class="btn btn-primary rounded-0 border-0"
                                style="background-color: #00CCD9">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                @endforeach

                <div class="mt-5">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>

    @include('shared.jumbotron')

    @include('shared.product_category')
@endsection
