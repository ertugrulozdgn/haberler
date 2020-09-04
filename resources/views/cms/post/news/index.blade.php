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
                                <th style="width: 50px">İşlemler</th>
                            </tr>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>Resim</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->create_by }}</td>
                                    <td>{{ $post->location }}</td>
                                    <td>{{ $post->published_at }}</td>
                                    <td>{{ $post->hit}}</td>
                                    <td width='5px'><a href=""><i class="fa fa-pencil-square fa-lg"></i></a></td>
                                    <td width='5px'><a href=""><i class="fa fa-pencil-square fa-lg"></i></a></td>
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