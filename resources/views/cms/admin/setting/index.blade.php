@extends('cms.master')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
        <br>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title vertical-middle"><i class="fa fa-cog"></i> Ayarlar</h3>
                </div>

                <div class="box-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th style="min-width: 250px">Ayar Adı</th>
                                <th style="width: 50px" >İşlemler</th>
                            </tr>
                            <tbody>
                                @foreach ($settings as $setting)
                                <tr>
                                    <td class="vertical-middle">{{ $setting->name }}</td>
                                    <td class="vertical-middle text-center" width='5px'><a href="{{ $setting->edit_link }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
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