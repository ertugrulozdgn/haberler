@extends('cms.master')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
        <br>
            <div class="box box-danger">
                <div class="box-header with-border">
                <h3 class="box-title vertical-middle"><i class="fa fa-newspaper-o"></i> {{ $location == 2 ? 'Manşet Sıralama' : 'Sürmanşet Sıralama' }}</h3>

                <span class="pull-right"><a href="{{ action('Cms\Post\NewsController@create') }}" class="btn btn-success">Yeni</a></span>
                </div>

                <div class="box-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th style="width: 50px">Sırala</th>
                                <th style="width: 50px">Sıra</th>
                                <th style="min-width: 300px">Başlık</th>
                                <th style="width: 130px">Yayın Tarihi</th>
                                <th style="width: 80px">Hit</th>
                                <th style="width: 50px">İşlemler</th>
                            </tr>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>                        
                                    <td class="vertical-middle"><i class="fa fa-align-justify"></i></td>
                                    <td class="vertical-middle">{{ $post->id }}</td>
                                    <td class="vertical-middle">{{ $post->title }}</td>
                                    <td class="vertical-middle">{{ $post->published_at->format('d.m.Y H:i') }}</td>
                                    <td class="vertical-middle">{{ $post->hit }}</td>
                                    <td class="vertical-middle" width='5px'><a href="{{ $post->edit_link }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                                    <td class="vertical-middle" width='5px'><a href="{{ $post->delete_link }}" data-action="delete"><i  class="fa fa-trash-o fa-lg"></i></a></td>
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