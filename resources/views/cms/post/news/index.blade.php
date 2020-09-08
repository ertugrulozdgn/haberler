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
                                <th class="text-center" style="width: 80px">Resim</th>
                                <th style="min-width: 200px">Başlık</th>
                                <th class="text-center" style="width: 150px">Oluşturan</th>
                                <th class="text-center" style="width: 150px">Yerleşim Türü</th>
                                <th class="text-center" style="width: 150px">Yayın Tarihi</th>
                                <th class="text-center" style="width: 150px">Hit</th>
                                <th class="text-center">İşlemler</th>
                            </tr>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td class="text-center">Resim</td>
                                    <td>{{ $post->title }}</td>
                                    <td class="text-center">{{ $post->created_by_name }}</td>
                                    <td class="text-center">{{ $post->location_name }}</td>
                                    <td class="text-center">{{ $post->published_at }}</td>
                                    <td class="text-center">{{ $post->hit }}</td>
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