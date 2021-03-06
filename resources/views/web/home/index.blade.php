@extends('web.layouts.master')

@section('title', config('settings.mainpage_title'))
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="swiper-container headline-slider" id="headlines">
                <div class="swiper-wrapper">
                    @foreach ($headlines as $headline)
                        <a href="{{ $headline->link }}" class="swiper-slide">
                            <img src="{{ $headline->cover_image }} " alt="">
                            <div class="img-shadow"></div>
                            <h2>{{ $headline->title }}</h2>
                        </a>
                    @endforeach
				</div>
				<div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="subheadlines">
                @foreach ($sub_headlines as $sub_headline)
                    <a href="{{ $sub_headline->link }}">
                        <img src="{{ $sub_headline->cover_image }}" alt="">
                        <div class="img-shadow"></div>
                        <h2>{{ $sub_headline->title }}</h2>
                    </a>
                @endforeach
			</div>
		</div>

    </div>
</div>

@widget('Web\Weather')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            @foreach ($posts as $post)
                @if ($loop->iteration %4 !== 0)
                <div class="post image-left-post">
                    <a href="{{ $post->link }}">
                        <img src="{{ $post->cover_image }} " alt="">
                    </a>
                    <div class="info">
                        @foreach ($post->categories as $category)
                            <span class="badge badge-secondary">{{ $category->name }}</span>
                        @endforeach
                            <a href="{{ $post->link }}">
                            <h2>{{ $post->title }}</h2>
                        </a>
                        <div>
                            <span>{{ $post->created_by_name }}</span>
                            <span>|</span>
                            <time class="text-muted">{{ $post->published_at->format('j l F, Y') }}</time><br>
                        </div>
                    </div>
                </div>
                @endif
                @if($loop->iteration %4 == 0)
                <div class="post big-post">
                    <a href="{{ $post->link }}">
                        <img src="{{ $post->cover_image }} " alt="">
                    </a>
                    <div class="info">
                        <a href="{{ $post->link }}">
                            @foreach ($post->categories as $category)
                                <span class="badge badge-secondary">{{ $category->name }}</span>
                            @endforeach
                            <h2>{{ $post->title }}</h2>
                            <p>{{ $post->summary }}</p>
                        </a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        @widget('Web\Viewed')


        <div class="news-detail-bottom-header">
            <h3>Başka Başka</h3>
            <hr>
        </div>
        <div class="row">
            @foreach ($crawler_posts as $item)
                <div class="col-lg-6">
                    <div class="post image-left-post">
                        <a href="{{ $item->link }}">
                            <img src="{{ $item->image }} " alt="">
                        </a>
                        <div class="info">
                            <span class="badge badge-secondary">{{ $item->site }}</span>
                            <a href="{{ $item->link }}">
                            <h2>{{ $item->title }}</h2>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
