@extends('web.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="tags-title">
            <h1>{{ $tag->name }}</h1>
            <span>Haberleri</span>
            <hr>
        </div>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-lg-4">
                <div class="tags">
                    <a href="{{ $post->link }}">
                        <img src="{{ $post->cover_image }}" alt="">
                        <h2>{{ $post->title }}</h2>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection