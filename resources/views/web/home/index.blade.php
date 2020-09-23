@extends('web.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="swiper-container headline-slider" id="headlines">
                <div class="swiper-wrapper">
                    @foreach ($headlines as $headline)
                    <a href="" class="swiper-slide">
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
                <a href="">
                    <img src="{{ $sub_headline->cover_image }}" alt="">
                    <div class="img-shadow"></div>
                    <h2>{{ $sub_headline->title }}</h2>

                </a>
                @endforeach
                {{-- <a href="">
                    <img src="https://i.teknolojioku.com/2/350/220/storage/files/images/2020/08/14/gm-20-pro-01-F1WW_cover.jpg.webp" alt="">
                    <div class="img-shadow"></div>
                    <h2>iPhone 11 fiyatında kaçırılmayacak indirim! Hem de Türkiye'de!</h2>
                </a> --}}
			</div>
		</div>

    </div>
    <hr id="">
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="post image-left-post">
                <a href="">
                    <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                </a>
                <div class="info">
                    <span class="badge badge-danger">TEKNOLOJI</span>
                    <a href="">
                        <h2>What the heck is going on with TikTok and Oracle, explained</h2>
                    </a>
                    <div>
                        <span>Ertuğrul Özdoğan</span>
                        <span>|</span>
                        <time class="text-muted" datetime="2020-09-19T13:00:00+03:00">19 Mayıs Cuma, 2020</time>
                    </div>
                </div>
            </div>
            <div class="post image-left-post">
                <a href="">
                    <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                </a>
                <div class="info">
                    <span class="badge badge-danger">TEKNOLOJI</span>
                    <a href="">
                        <h2>What the heck is going on with TikTok and Oracle, explained</h2>
                    </a>
                    <div>
                        <span>Ertuğrul Özdoğan</span>
                        <span>|</span>
                        <time class="text-muted" datetime="2020-09-19T13:00:00+03:00">19 Mayıs Cuma, 2020</time>
                    </div>
                </div>
            </div>
            <div class="post big-post">
                <a href="">
                    <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                </a>
                <div class="info">
                    <a href="">
                        <span class="badge badge-secondary">TEKNOLJI</span>
                        <h2>What the heck is going on with TikTok and Oracle, explained</h2>
                        <p>It looks like we’re stuck with video chat. Is that such a bad thing?</p>
                    </a>
                    <div>
                        <span>Ertuğrul Özdoğan</span>
                        <span>|</span>
                        <time class="text-muted" datetime="2020-09-19T13:00:00+03:00">19 Mayıs Cuma, 2020</time>
                    </div>
                </div>
            </div>
            <div class="post image-left-post">
                <a href="">
                    <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                </a>
                <div class="info">
                    <span class="badge badge-danger">TEKNOLOJI</span>
                    <a href="">
                        <h2>What the heck is going on with TikTok and Oracle, explained</h2>
                    </a>
                    <div>
                        <span>Ertuğrul Özdoğan</span>
                        <span>|</span>
                        <time class="text-muted" datetime="2020-09-19T13:00:00+03:00">19 Mayıs Cuma, 2020</time>
                    </div>
                </div>
            </div>
            <div class="post image-left-post">
                <a href="">
                    <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                </a>
                <div class="info">
                    <span class="badge badge-danger">TEKNOLOJI</span>
                    <a href="">
                        <h2>What the heck is going on with TikTok and Oracle, explained</h2>
                    </a>
                    <div>
                        <span>Ertuğrul Özdoğan</span>
                        <span>|</span>
                        <time class="text-muted" datetime="2020-09-19T13:00:00+03:00">19 Mayıs Cuma, 2020</time>
                    </div>
                </div>
            </div>
        </div>

        @widget('Web\Viewed')
        
    </div>
</div>

@endsection
