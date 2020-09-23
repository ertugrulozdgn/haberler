<header id="app-header" class="sticky-top">
    <div class="container">
		<nav class="d-flex">
			<a href="/" class="icon-logo"></a>
			<ul class="d-flex justify-content-between align-items-center mr-auto">
				@foreach ($categories as $category)
				<li>
					<a href="#">{{ $category->name }}</a>
				</li>
				@endforeach

				{{-- <li>
					<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					MORE
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<a class="dropdown-item disable-item-2" href="#">Another 1</a>
						<a class="dropdown-item disable-item-2" href="#">Another 2</a>
						<a class="dropdown-item disable-item-2" href="#">Another 3</a>
					</div>
				</li> --}}
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
		</nav>
    </div>
</header>
