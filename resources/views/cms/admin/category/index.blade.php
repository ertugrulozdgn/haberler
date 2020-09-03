@extends('cms.master')

@section('content')
<div class='content-wrapper'>
        <div class='container-fluid'>
        <br>
        <div class='box box-danger'>
            <div class='box-header with-border'>
                <h3 class='box-title vertical-middle'><i class="fa fa-user"></i> Kategoriler</h3>

                <span class="pull-right"><a href="{{ action('Cms\Admin\CategoryController@create') }}" class="btn btn-success">Yeni</a></span>
            </div>

            <div class='box-body'>
                <table class='table table-stripped'>
                    <thead>
                        <tr>
                            <th>Adı</th>    
                        </tr>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td width='5px'><a href="{{ action('Cms\Admin\CategoryController@edit', [$category->id]) }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
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