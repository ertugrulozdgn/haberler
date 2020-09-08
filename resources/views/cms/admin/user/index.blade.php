@extends('cms.master')
@section('content')
    <div class='content-wrapper'>
        <div class='container-fluid'>
        <br>
        <div class='box box-danger'>
            <div class='box-header with-border'>
                <h3 class='box-title vertical-middle'><i class="fa fa-user"></i> Editörler</h3>

                <span class="pull-right"><a href="{{ action('Cms\Admin\UserController@create') }}" class="btn btn-success">Yeni</a></span>
            </div>

            <div class='box-body'>
                <table class='table table-stripped'>
                    <thead>
                        <tr>
                            <th style='min-width: 200px'>Adı</th>
                            <th style="width: 250px">E-posta</th>
                            <th style="width: 150px">Yetki</th>
                            <th style="width: 150px">Son Giriş</th>
                            <th style="width: 50px">İşlemler</th>
                        </tr>
                        <tbody>
                        @foreach($users as $user)
                            <tr class=" {{ $user->status == 0 ? 'alert alert-light' : ''}}">
                                <td class="vertical-middle">{{$user->name}}</td>
                                <td class="vertical-middle">{{$user->email}}</td>
                                <td class="vertical-middle">Admin</td>
                                <td>
                                    {{  \Carbon\Carbon::parse($user->last_login)->format('d.m.Y') }} <br>
                                    {{  \Carbon\Carbon::parse($user->last_login)->format('H:i') }}
                                </td>
                                @if($user->id !== 1 || Auth::user()->id == 1)
                                    <td class="vertical-middle" width='5px'><a href="{{ action('Cms\Admin\UserController@edit', [$user->id]) }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                                @endif
                                @if($user->id !== 1 && Auth::user()->id !== $user->id)
                                <td class="vertical-middle" width='5px'><a href="{{ action('Cms\Admin\UserController@destroy', $user->id) }}" data-action="delete"><i  class="fa fa-trash-o fa-lg"></i></a></td>
                                @endif
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
