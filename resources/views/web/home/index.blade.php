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

<div class="container">
    <div class="row">
        @foreach ($crawler_posts as $item)
            <div class="col-12 col-md-4 col-lg-2">
                <a href="{{ $item->link }}" target="_blank">
                    {{ $item->title }}
                </a>
            </div>
        @endforeach
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
                            <time class="text-muted">{{ $post->published_at->format('j l F, Y') }}</time>
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
                            <span class="badge badge-secondary">TEKNOLJI</span>
                            <h2>{{ $post->title }}</h2>
                            <p>{{ $post->summary }}</p>
                        </a>
                        {{-- <div>
                            <span>Ertuğrul Özdoğan</span>
                            <span>|</span>
                            <time class="text-muted" datetime="2020-09-19T13:00:00+03:00">19 Mayıs Cuma, 2020</time>
                        </div> --}}
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        @widget('Web\Viewed')
        
    </div>
</div>
@endsection
