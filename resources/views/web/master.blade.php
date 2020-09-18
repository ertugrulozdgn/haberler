<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="{{ mix('assets/web/css/build.css') }}">

    <title>Vox</title>

  </head>
  <body>

  @widget('web.header')
  @widget('web.content')

  <script src="{{ mix("assets/web/js/build.js") }}"></script>
  {{-- <script src="https://unpkg.com/swiper/swiper-bundle.js"></script> --}}
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>  
  <script>
    var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + (index + 1) + '</span>';
        },
      },
    });
  </script> 
  </body>
</html>
