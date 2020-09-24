<div class="col-lg-4 sideposts-hidden">
    <div class="sideposts">
        <h3>EN ÇOK OKUNANLAR</h3>

       @foreach ($posts_viewed as $post_viewed)
       <div>
        <a href="{{ $post_viewed->link }}">
            <span>1</span>
            <img src="{{ $post_viewed->cover_image }} " alt="">
            <span>{{ $post_viewed->title }}</span>
        </a>
       </div>
       @endforeach
    </div>
</div>