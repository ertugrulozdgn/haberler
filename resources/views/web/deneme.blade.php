<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ mix('assets/web/css/build.css') }}">
</head>
<body>
<header id="app-header" class="sticky-top">
    <div class="container">
		<nav class="d-flex">
			<a href="{{ action('Web\HomeController@index') }}" class="icon-logo"></a>
			<ul class="d-flex justify-content-between align-items-center mr-auto">
				<li>
					<a href="#">CORONA</a>
                </li>
                <li>
					<a href="#">CORONA</a>
                </li>
                <li>
					<a href="#">CORONA</a>
                </li>
                <li>
					<a href="#">CORONA</a>
                </li>
                <li>
					<a href="#">CORONA</a>
				</li>
        	</ul>
			<ul class="d-flex justify-content-between align-items-center">
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
            <span id="main" onclick="openNav()">&#9776;</span>
            <div id="mySidenav" class="sidenav">
                <a href="{{ action('Web\HomeController@index') }}" class="icon-logo"></a>
                <hr>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <span></span>
                <a href="#"><i class="fa fa-angle-right"></i> Güncel</a>
                <a href="#"><i class="fa fa-angle-right"></i> Teknoloji</a>
                <a href="#"><i class="fa fa-angle-right"></i> Oyun</a>
                <a href="#"><i class="fa fa-angle-right"></i> Sinema</a>
            </div>
		</nav>
    </div>
</header>

<script src="{{ mix("assets/web/js/build.js") }}"></script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.color = "#f8f9fa";
  document.body.style.backgroundColor = "rgba(0,0,0,0.2)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.color = "#000";
  document.body.style.backgroundColor = "white";
}
</script>
   
</body>
</html> 
