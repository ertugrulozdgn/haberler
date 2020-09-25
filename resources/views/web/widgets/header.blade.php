<header id="app-header" class="sticky-top">
    <div class="container">
		<nav class="d-flex">
			<a href="{{ action('Web\HomeController@index') }}" class="icon-logo"></a>
			<ul class="d-flex justify-content-between align-items-center mr-auto">
				@foreach ($show_categories as $category)
				<li>
					<a href="{{ $category->link }}">{{ $category->name }}</a>
				</li>
				@endforeach
        	</ul>
			<ul class="d-flex justify-content-between align-items-center social-hidden">
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
					<a href=""><i class="fa fa-rss"></i></a>
				</li>

				<li>
					<a href=""><i class="fa fa-search"></i></a>
				</li>
			</ul>

			@widget('Web\Sidemenu')

		</nav>
    </div>
</header>



