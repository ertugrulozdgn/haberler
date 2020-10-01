@extends('web.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="page-header">
            <h3>{{ $page->title }}</h3>
            <hr>
        </div>
        <div>
            <p>{!! $page->content !!}</p>
        </div>
    </div>
@endsection