@extends('web.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="news-detail">
            <h1>Trump moves to shut down WeChat in the US. But TikTok will live until after the election.</h1>
            <p>Both companies have Chinese owners. One of them has support from Trump backers</p>
            <span class="badge badge-secondary">Güncel</span>
            <span class="badge badge-secondary">Otomobil</span><br>
            <span>Ertuğrul Özdoğan</span>
            <span>|</span>
            <time class="text-muted" datetime="2020-09-19T13:00:00+03:00">19 Mayıs Cuma, 2020</time>
            <div class="social">
                <a href="">
                    <i class="fa fa-facebook fa-lg"></i>
                </a>
                <a href="">
                    <i class="fa fa-twitter fa-lg"></i>
                </a>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-8">
                    <div class="news-detail-content">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                        <p>The Trump administration says it will effectively shut down WeChat, the mobile chat/payment service popular with millions of Chinese Americans, on Sunday.</p>
                        <p>And the administration says it will do the same thing to TikTok, the mobile video service popular with tens of millions of Americans — but only after the November election.</p>
                        <p>Friday’s news combines several different strands of politics, policy, and realpolitik: legitimate concerns about China’s ability to exert influence in the US via consumer technology; American electoral politics; and links between US tech executives and investors with the White House.</p>
                        <p>But the top line is straightforward: The Trump administration gets to say it is getting tough with China by moving to shut down one important Chinese-owned app in the US — while keeping another important Chinese-owned app, with ties to Trump supporters, running through the fall.</p>
                        <p>Commerce Secretary Wilbur Ross announced the moves in a press release Friday morning, and then stated it more explicitly in an interview with Fox Business News: “For all practical purposes [WeChat] will be shut down in the US, but only in the US, as of midnight Monday.”</p>
                        <p>TikTok, meanwhile, would be allowed to keep operating in the US through November 12, so existing users of the app aren’t likely to be affected. But Trump’s announcement is meant to force Apple and Google to remove TikTok from their app stores — which means the service would not be able to add new users — and to prevent TikTok from updating the app for existing users.</p>
                    </div>
                </div>

                @widget('Web\Viewed')

            </div>
        </div>
    </div>

    <div class="container recommended-hidden mt-3">
        <div class="news-detail-bottom-header">
            <h3>Önerilenler</h3>
        <hr>
        </div>
        <div class="recommended">
            <a href="">
                <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                <span>This theory might explain “Covid toes” and other mysteries of the disease</span>
            </a>
            <a href="">
                <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                <span>This theory might explain “Covid toes” and other mysteries of the disease</span>
            </a>
            <a href="">
                <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                <span>This theory might explain “Covid toes” and other mysteries of the disease</span>
            </a>
            <a href="">
                <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                <span>This theory might explain “Covid toes” and other mysteries of the disease</span>
            </a>
            <a href="">
                <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                <span>This theory might explain “Covid toes” and other mysteries of the disease</span>
            </a>
        </div>
    </div>

    <div class="container mt-4">
        <div class="news-detail-bottom-header">
            <h3>Son Gönderiler</h3>
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="post image-left-post">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                    </a>
                    <div class="info">
                        <a href="">
                            <h2 class="info-header" >What the heck is going on with TikTok and Oracle, explained</h2>
                        </a>
                        <div>
                            <span>Ertuğrul Özdoğan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="post image-left-post">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                    </a>
                    <div class="info">
                        <a href="">
                            <h2 class="info-header" >What the heck is going on with TikTok and Oracle, explained</h2>
                        </a>
                        <div>
                            <span>Ertuğrul Özdoğan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="post image-left-post">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                    </a>
                    <div class="info">
                        <a href="">
                            <h2 class="info-header" >What the heck is going on with TikTok and Oracle, explained</h2>
                        </a>
                        <div>
                            <span>Ertuğrul Özdoğan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="post image-left-post">
                    <a href="">
                        <img src="{{ asset('/storage/file/images/2020/09/23/deneme_cover_img_5f6b2e385581e.jpg') }} " alt="">
                    </a>
                    <div class="info">
                        <a href="">
                            <h2 class="info-header" >What the heck is going on with TikTok and Oracle, explained</h2>
                        </a>
                        <div>
                            <span>Ertuğrul Özdoğan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection