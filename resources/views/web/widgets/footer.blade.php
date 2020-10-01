<footer>
    <div class="container">
        <div class="footer">
            <a href="{{ action('Web\HomeController@index') }}" class="icon-logo"></a>
            <ul>
				@foreach ($pages as $page)
                <li>
                    <a href="{{ $page->link }}">{{ $page->title }}</a>
				</li>
                @endforeach
            </ul>
            <div class="information">
                <span>BILGIN PRO</span>
                <span>ERTUĞRUL ÖZDOĞAN</span>
                <span>ISTANBUL</span>
                <span>2020</span>
            </div>
        </div>
    </div>
</footer>