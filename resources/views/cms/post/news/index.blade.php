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
                                <tr>
                                    
                                <td class="vertical-middle"><img src="" alt=""></td>
                                    <td>
                                        {{ $post->title }} <br>
                                        @foreach ($post->categories as $category)
                                            <span class="badge badge-danger badge-roundless"> {{ $category->name }} </span>
                                        @endforeach
                                    </td>
                                    <td class="vertical-middle">{{ $post->created_by_name }}</td>
                                    <td class="vertical-middle">{{ $post->location_name }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($post->published_at)->format('d.m.Y') }} <br>
                                        {{ \Carbon\Carbon::parse($post->published_at)->format('H:i')}}
                                    </td>
                                    <td class="vertical-middle">{{ $post->hit }}</td>
                                    <td width='5px'><a href=""><i class="fa fa-pencil-square fa-lg"></i></a></td>
                                    <td width='5px'><a href="{{ action('Cms\Post\NewsController@destroy', $post->id) }}" data-action="delete"><i  class="fa fa-trash-o fa-lg"></i></a></td>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection