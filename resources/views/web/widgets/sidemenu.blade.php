<span id="main" onclick="openNav()">&#9776;</span>
<div id="mySidenav" class="sidenav">
    <a href="{{ action('Web\HomeController@index') }}" class="icon-logo"></a>
    <span>
        <a href=""><i class="fa fa-twitter"></i></a>
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href=""><i class="fa fa-youtube-play"></i></a>
        <a href=""><i class="fa fa-rss" aria-hidden="true"></i></a>
    </span>
    <hr>
    <div>Kategoriler</div>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    @foreach ($categories as $category)
      <a href="{{ $category->link }}"><i class="fa fa-angle-right"></i> {{ $category->name }}</a>
    @endforeach
    <hr>
    <div>Kurumsal</div>
    @foreach ($pages as $page)
      <a href="{{ $page->link }}"><i class="fa fa-angle-right"></i> {{ $page->title }}</a>
    @endforeach
</div>

@section('js')
<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
	  document.getElementById("main").style.visibility = "hidden";
	  // document.body.style.backgroundColor = "rgba(0,0,0,0.2)";
	}
	
	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.visibility = "visible";
	  document.body.style.backgroundColor = "white";
	}
	</script>
@endsection