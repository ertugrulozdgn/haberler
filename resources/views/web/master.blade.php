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

{{-- id="app-header" ekle buraya --}}
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a href="/" class="icon-logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">CORONAVIRUS</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">OPEN SORUCED</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">RECODE</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">THE GOODS</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">FUTURE PERFECT</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">THE HIGHLIGHT</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              MORE
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
            </div>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li>
            <a href=""><i class="fa fa-twitter"></i></a>
          </li>

          <li>
            <a href=""><i class="fa fa-facebook"></i></a>
          </li>

          <li>
            <a href=""><i class="fa fa-youtube-play"></i></a>
          </li>

          <li>
            <a href=""><i class="fa fa-rss" aria-hidden="true"></i></a>
          </li>

          <li>
            <a href=""><i class="fa fa-search"></i></a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>
</header>


  <script src="{{ mix("assets/web/js/build.js") }}"></script>
  </body>
</html>