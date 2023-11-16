@extends('layouts.main', ['title' => 'Berita - Leaderhub', 'menu' => 'posts'])

@section('content')
    <div class="container mt-5 pt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h1 class="h4 fw-bold">Berita</h1>
                @foreach ($posts as $item)
                    <div class="row d-flex align-items-start mb-4 mt-4">
                        <div class="col-md-4">
                            <div class="text-center pt-1">
                                <img class="w-100 rounded" src="{{ asset('storage/' . @$item->media[0]->url) }}"
                                    alt="{{ @$item->media[0]->alt }}" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h2 class="h5 fw-bold">{{ $item->title }}</h2>
                            <div class="text-muted mb-1" style="font-style: italic; font-size: 14px">
                                {{ @$item->published_at != null ? @$item->published_at->format('d F Y') : '' }}</div>
                            <p>
                                {!! \Illuminate\Support\Str::limit(@$item->body ?? '', 130) !!}
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

    @include('shared.product_category', ['product_categories' => @$product_categories])
@endsection
