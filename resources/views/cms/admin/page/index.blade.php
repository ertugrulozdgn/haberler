@extends('cms.master')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
        <br>
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title vertical-middle"><i class="fa fa-file-o"></i> Sayfalar</h3>

                <span class="pull-right"><a href="{{ action('Cms\Admin\PageController@create') }}" class="btn btn-success">Yeni</a></span>
            </div>

            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="min-width: 200px;">Başlık</th>
                            <th style="width: 150px">Footer'da göster</th>
                            <th style="width: 100px">Ağırlık</th>
                            <th style="width: 50px">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                    <tr class="{{ $page->status == 0 ? 'alert alert-light' : ''}}">
                                <td>{{ $page->title }}</td>
                                {{-- <td>
                                    @foreach ($show_in_footer as $value => $name)
                                    <span class="{{ $page->show_in_footer == 1 ? 'badge badge-success' : 'badge badge-danger' }}">{{ $page->show_in_footer == $value ? $name : ''}}</span>
                                    @endforeach
                                </td> --}}
                                <td><span class="{{ $page->show_in_footer == 0 ? 'badge badge-danger badge-roundless' : 'badge badge-success badge-roundless'}}">{{ $page->show_in_footer_name }}</span></td>
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
