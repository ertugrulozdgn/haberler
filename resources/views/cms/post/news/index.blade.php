@extends('cms.master')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
        <br>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title vertical-middle"><i class="fa fa-newspaper-o"></i> Haberler</h3>

                <span class="pull-right"><a href="{{ action('Cms\Post\NewsController@create') }}" class="btn btn-success">Yeni</a></span>
                </div>

                <div class="box-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th style="width: 80px">Resim</th>
                                <th style="min-width: 200px">Başlık</th>
                                <th style="width: 150px">Oluşturan</th>
                                <th style="width: 150px">Yerleşim Türü</th>
                                <th style="width: 150px">Yayın Tarihi</th>
                                <th style="width: 100px">Hit</th>
                                <th>İşlemler</th>
                            </tr>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr class=" {{ $post->status == 0 ? ('alert alert-light') : ( $post->status == 2 ? 'alert alert-primary' : '' ) }}">
                                    
                                <td class="vertical-middle"><img class="img-fluid" width="100px" src="{{ $post->cover_image }}" alt=""></td>
                                    <td class="vertical-middle">
                                        {{ $post->title }} <br>
                                        @foreach ($post->categories as $category)
                                            <span class="badge badge-roundless"> {{ $category->name }} </span>
                                        @endforeach
                                    </td>
                                    <td class="vertical-middle">{{ $post->created_by_name }}</td>
                                    <td class="vertical-middle">{{ $post->location_name }}</td>
                                    <td class="vertical-middle">
                                        {{ \Carbon\Carbon::parse($post->published_at)->format('d.m.Y') }} <br>
                                        {{ \Carbon\Carbon::parse($post->published_at)->format('H:i')}}
                                    </td>
                                    <td class="vertical-middle">{{ $post->hit }}</td>
                                    <td class="vertical-middle" width='5px'><a href="{{ $post->edit_link }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                                    <td class="vertical-middle" width='5px'><a href="{{ $post->delete_link }}" data-action="delete"><i  class="fa fa-trash-o fa-lg"></i></a></td>
                                </tr>   
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection