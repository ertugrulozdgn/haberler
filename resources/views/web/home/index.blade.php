@extends('web.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="swiper-container headline-slider" id="headlines">
                <div class="swiper-wrapper">
                    <a href="" class="swiper-slide">
                        <img src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">
                        <h2>Ehliyetler çipli kimlik kartına entegre oluyor</h2>
                    </a>
                    <a href="" class="swiper-slide">
                        <img src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">
                        <h2>Apple Watch ile spor yapanlara 2100 TL ödeme yapılacak!</h2>
                    </a>
                    <a href="" class="swiper-slide">
                        <img src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">
                        <h2>iPhone 11 fiyatında kaçırılmayacak indirim! Hem de Türkiye'de!</h2>
                    </a>
				</div>
				<div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="subheadlines">
                <a href="">
                    <img src="https://i.teknolojioku.com/2/350/220/storage/files/images/2020/09/15/2020-nissan-qashqai-fiyatlari-1Tnq_cover.jpg.webp" alt="">
                    <h2>Ehliyetler çipli kimlik kartına entegre oluyor</h2>

                </a>
                <a href="">
                    <img src="https://i.teknolojioku.com/2/350/220/storage/files/images/2020/08/14/gm-20-pro-01-F1WW_cover.jpg.webp" alt="">
                    <h2>iPhone 11 fiyatında kaçırılmayacak indirim! Hem de Türkiye'de!</h2>
                </a>
			</div>
		</div>

    </div>
    <hr>
</div>

{{-- MANŞET HABER BİTİŞİ --}}

{{--<div class="container">--}}
{{--	<div class="row">--}}
{{--		<div class="col-md-9">--}}

{{--			<div class="card border-0">--}}
{{--				<div class="row">--}}
{{--					<div class="col-5 col-md-5">--}}
{{--						<a href="">--}}
{{--							<img class="img-fluid" src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">--}}
{{--						</a>--}}
{{--					</div>--}}
{{--					<div class="col-7 col-md-7">--}}
{{--						<a href="">--}}
{{--							<h2 class="normal-news-text">iPhone 11 fiyatında kaçırılmayacak indirim! Hem de Türkiye'de!</h2>--}}
{{--						</a>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}

{{--		</div>--}}
{{--	</div>--}}
{{--</div>--}}

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="posts">

                <div class="row mb-3">
                    <div class="col-5 col-md-4">
                        <a href="">
                            <img class="img-fluid" src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">
                        </a>
                    </div>

                    <div class="col-7 col-md-8">
                        <a href="">
                            <h2>What the heck is going on with TikTok and Oracle, explained</h2>
                        </a>
                        <div class="subinformation">
                            <span>Ertuğrul Özdoğan</span>
                            <span>|</span>
                            <span class="text-muted">Cuma 10</span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-5 col-md-4">
                        <a href="">
                            <img class="img-fluid" src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">
                        </a>
                    </div>

                    <div class="col-7 col-md-8">
                        <a href="">
                            <h2>What the heck is going on with TikTok and Oracle, explained</h2>
                        </a>
                        <div class="subinformation">
                            <span>Ertuğrul Özdoğan</span>
                            <span>|</span>
                            <span class="text-muted">Cuma 10</span>
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-md-12">
                       <div class="">
                           <a href="">
                               <img class="img-fluid" src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">
                           </a>

                           <span class="badge badge-danger">TEKNOLOJI</span>

                           <a href="">
                               <h2>What the heck is going on with TikTok and Oracle, explained</h2>
                           </a>

                           <p>It looks like we’re stuck with video chat. Is that such a bad thing?</p>

                           <div class="">
                               <span>Ertuğrul Özdoğan</span>
                               <span>|</span>
                               <span class="text-muted">Cuma 10</span>
                           </div>
                       </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-5 col-md-4">
                        <a href="">
                            <img class="img-fluid" src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">
                        </a>
                    </div>

                    <div class="col-7 col-md-8">
                        <a href="">
                            <h2>What the heck is going on with TikTok and Oracle, explained</h2>
                        </a>
                        <div class="subinformation">
                            <span>Ertuğrul Özdoğan</span>
                            <span>|</span>
                            <span class="text-muted">Cuma 10</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <h3>VOX EN ÇOK OKUNANLAR</h3>

            <div class="col-md-12">
                <div class="sideposts">
                    <div class="row">
                        <a href="">
                            <img class="img-fluid" src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">
                            <span>This theory might explain “Covid toes” and other mysteries of the disease</span>
                        </a>
                    </div>

                    <div class="row">
                        <a href="">
                            <img class="img-fluid" src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">
                            <span>This theory might explain “Covid toes” and other mysteries of the disease</span>
                        </a>
                    </div>

                    <div class="row">
                        <a href="">
                            <img class="img-fluid" src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">
                            <span>This theory might explain “Covid toes” and other mysteries of the disease</span>
                        </a>
                    </div>

                    <div class="row">
                        <a href="">
                            <img class="img-fluid" src="{{ asset('/storage/file/images/2020/09/18/deneme2_cover_img_5f647b7d3433c.jpg') }} " alt="">
                            <span>This theory might explain “Covid toes” and other mysteries of the disease</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
