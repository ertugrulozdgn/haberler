window.Slider = {};

Slider.headlines = function() {
    // headlineSlider = new Swiper('.headline-slider', {
    //     loop: true,
    //     slidesPerView: 1,
    //     slidesPerGroup: 1,
    //     autoplay: {
    //         delay: 8000
    //     },
    //     pagination: {
    //         el: '.swiper-pagination',
    //     },
    // });
    var swiper = new Swiper('.swiper-container', {
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
          renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
          },
        },
      });
}