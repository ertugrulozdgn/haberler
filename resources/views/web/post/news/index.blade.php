@extends('web.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="category-title">
            <span>Kategori</span>
            <h1>Teknoloji</h1>
            <span>Haberleri</span>
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="category-headline">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                        <h3>The Senate failed to pass more stimulus for a struggling economy. Here’s why.</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="category-headline">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                        <h3>“It’s kinda like a first date”: Making the most of starting a new job remotely.</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="category-image-left-post">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                    </a>
                    <div class="category-info">
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
                <div class="category-image-left-post">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                    </a>
                    <div class="category-info">
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
                <div class="category-image-left-post">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                    </a>
                    <div class="category-info">
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
                <div class="category-image-left-post">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                    </a>
                    <div class="category-info">
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
                <div class="category-image-left-post">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                    </a>
                    <div class="category-info">
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
                <div class="category-image-left-post">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                    </a>
                    <div class="category-info">
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