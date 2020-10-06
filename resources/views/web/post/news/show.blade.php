@extends('web.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="news-detail">
            <div class="d-flex justify-content-between mb-3 align-items-center">
                <div class="d-flex align-items-center">
                    @foreach ($post->categories as $category)
                    <span class="badge badge-secondary mr-2">{{ $category->name }}</span>
                    @endforeach
                    <span class="mr-1">{{ $post->created_by_name . ' | '}}</span>
                    <time class="text-muted">{{ $post->published_at->format('j l F, Y') }}</time>
                </div>
                <div class="social">
                    <a href="">
                        <i class="fa fa-facebook fa-lg"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-twitter fa-lg"></i>
                    </a>
                </div>
            </div>
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->summary }}</p>
            <hr>
            <div class="row">
                <div class="col-lg-8">
                    <div class="news-detail-content">
                        <img src="{{ !empty($post->headline_image) ? $post->headline_image : $post->cover_image }} " alt="">
                        <p>{!! $post->content !!}</p>
                    </div>
                </div>

                @widget('Web\Viewed')

            </div>
        </div>
        <div class="col-lg-8">
            <div class="tags">
                <span>Etiketler</span>
                @foreach ($post->tags as $tag)
                <a href="{{ $tag->link }}" class="badge badge-secondary">{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="news-detail-bottom-header">
            <h3>Önerilenler</h3>
        <hr>
        </div>
        <div class="row">
            @foreach ($recommended_posts as $recommended_post)
                <div class="col-6 col-lg-3">
                    <div class="recommended">
                        <a href="{{ $recommended_post->link }}">
                            <img src="{{ $recommended_post->cover_image }} " alt="">
                            <span>{{ $recommended_post->title }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-4">
        <div class="news-detail-bottom-header">
            <h3>Son Gönderiler</h3>
            <hr>
        </div>
        <div class="row">
            @foreach ($last_posts as $other_post)
                <div class="col-lg-6">
                    <div class="post image-left-post">
                        <a href="">
                            <img src="{{ $other_post->cover_image }} " alt="">
                        </a>
                        <div class="info">
                            <a href="">
                                <h2 class="info-header">{{ $other_post->title }}</h2>
                            </a>
                            <div>
                                <span>{{ $other_post->created_by_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection