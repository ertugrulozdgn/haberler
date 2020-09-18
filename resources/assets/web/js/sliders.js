window.Slider = {};

Slider.headlines = function() {
    headlineSlider = new Swiper('.headline-slider', {
        loop: true,
        slidesPerView: 1,
        slidesPerGroup: 1,
        autoplay: {
            delay: 8000
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
}