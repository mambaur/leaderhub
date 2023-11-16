@extends('layouts.main', ['title' => 'Berita - Leaderhub', 'menu' => 'posts'])

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <span class="h4 fw-bold">Berita</span>
                <div class="text-center py-3">
                    <img class="w-100 rounded" src="{{ asset('storage/' . @$post->media[0]->url) }}"
                        alt="{{ @$post->media[0]->url }}" />
                </div>
                <h1 class="h4 fw-bold">{{ $post->title }}</h1>
                <div class="text-muted mb-3" style="font-style: italic; font-size: 14px">
                    {{ @$post->published_at != null ? @$post->published_at->format('d F Y') : '' }}</div>
                <p>
                    {!! $post->body !!}
                </p>
            </div>
        </div>
    </div>

    @include('shared.product_category', ['product_categories' => @$product_categories])
@endsection
