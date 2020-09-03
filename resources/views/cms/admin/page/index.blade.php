@extends('cms.master')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
        <br>
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title vertical-middle"><i class="fa fa-user"></i>Sayfalar</h3>

                <span class="pull-right"><a href="{{ action('Cms\Admin\PageController@create') }}" class="btn btn-success">Yeni</a></span>
            </div>

            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="min-width: 200px;">Başlık</th>
                            <th>Footer'da göster</th>
                            <th>Ağırlık</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->show_in_footer }}</td>
                                <td>{{ $page->weight }}</td>
                                <td width='5px'><a href="{{ action('Cms\Admin\PageController@edit', [$page->id]) }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                                <td width='5px'><a href="{{ action('Cms\Admin\PageController@destroy', $page->id) }}" data-action="delete"><i  class="fa fa-trash-o fa-lg"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
@endsection
