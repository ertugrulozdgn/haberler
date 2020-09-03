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
                            <th>E-posta</th>
                            <th>Yetki</th>
                            <th>Son Giriş</th>
                            <th>İşlemler</th>
                        </tr>
                        <tbody>
                        @foreach($users as $user)
                            <tr id="item-{{ $user->id }}" class=" {{ $user->status == 0 ? 'alert alert-light' : ''}}">
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>Admin</td>
                                <td>{{$user->last_login}}</td>
                                <td width='5px'><a href="{{ action('Cms\Admin\UserController@edit', [$user->id]) }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                                {{-- @if($user->id !== 1) --}}
                                    <td width='5px'><a href="{{ action('Cms\Admin\UserController@destroy', $user->id) }}" data-action="delete"><i id="{{ $user->id }}" class="fa fa-trash-o fa-lg"></i></a></td>
                                {{-- @endif --}}
                            </tr>
                        @endforeach
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
        </div>
    </div>

{{--     
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');

            alertify.confirm('Silme işlemini onaylıyor musunuz?','Bu işlem geri alınamaz',
                function () {
                    $.ajax({
                        type:"DELETE",
                        url:"user/"+destroy_id,
                        success: function (msg) {
                            if (msg)
                            {
                                $("#item-"+destroy_id).remove();
                                alertify.success("Silme işlemi Başarılı");
                            }
                            else
                            {
                                alertify.error("İşlem Tamamlanamadı");
                            }
                        }
                    });

                },
                function () {
                    alertify.error('Silme işlemi iptal edildi.')
                },
            )
        });
    </script> --}}
@endsection
