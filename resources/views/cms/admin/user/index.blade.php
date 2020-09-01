@extends('cms.master')
@section('content')    
    <div class='content-wrapper'>
        <div class='container-fluid'>
        <br>
        <div class='box box-danger'>
            <div class='box-header with-border'>
                <h3 class='box-title vertical-middle'><i class="fa fa-user"></i> Editörler</h3>

                <span class="pull-right"><a href="" class="btn btn-success">Yeni</a></span>
            </div>

            <div class='box-body'>
                <table class='table table-stripped'>
                    <thead>
                        <tr>
                            <th style='min-width: 200px'>Adı</th>
                            <th>E-posta</th>
                            <th>Yetki</th>
                            <th>Son Giriş</th>
                            <th>İşlemler</th>
                        </tr>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>Admin</td>
                                <td>{{$user->last_login}}</td>
                                <td width='5px'><a href=""><i class="fa fa-pencil-square fa-lg"></i></a></td>
                                <td width='5px'><a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"></i></a></td>
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