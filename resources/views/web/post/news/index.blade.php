@extends('web.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="category-title">
            <span>Kategori</span>
            <h1>{{ $category->name }}</h1>
            <span>Haberleri</span>
            <hr>
        </div>
        <div class="row">
            @foreach ($header_posts as $header_post)
                <div class="col-lg-6">
                    <div class="category-headline">
                        <a href="{{ $header_post->link }}">
                            <img src="{{ $header_post->cover_image }} " alt="{{ $header_post->title }}">
                            <h3>{{ $header_post->title }}</h3>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($posts as $post)
                    <div class="category-image-left-post">
                        <a href="{{ $post->link }}">
                            <img src="{{ $post->cover_image }}" alt="">
                        </a>
                        <div class="category-info">
                            <a href="">
                                <h2>{{ $post->title}}</h2>
                            </a>
                            <div>
                                <span>{{ $post->created_by_name }}</span>
                                <span>|</span>
                                <time class="text-muted">{{ $post->published_at->format('j l F, Y') }}</time>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @widget('Web\Viewed')
            
        </div>
    </div>
@endsection