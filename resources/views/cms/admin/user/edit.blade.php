@extends('cms.master')
@section('content')
    <div class="content-wrapper">
        <div class='box box-danger'>
            <div class='box-header with-border'>
                <h3 class='box-title vertical-middle'><i class="fa fa-user"></i> Yeni Editör Ekle</h3>
            </div>

            <div class="box-body">
                <div class="col-lg-12">
                    {{ Form::open([
                        'url' => $edit > 0 ? action('Cms\Admin\UserController@update', [$user->id]) : action('Cms\Admin\UserController@store'),
                        'method' => $edit > 0 ? 'PUT' : 'POST',
                        'files' => true
                    ]) }}

                    <div class="form-group">
                        <div class="col-lg-2">
                            {{ Form::label('name', 'Adı', ['class' => 'control-label']) }}
                            <span class="required control-label">*</span>
                        </div>
                        <div class="col-lg-10">
                            {{ Form::text('name', $edit > 0 ? $user->name : '', ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-2">
                            {{ Form::label('email', 'E-posta', ['class' => 'control-label']) }}
                            <span class="required control-label">*</span>
                        </div>
                        <div class="col-lg-10">
                            {{ Form::text('email', $edit > 0 ? $user->email : '', ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-2">
                            {{ Form::label('password', 'Şifre', ['class' => 'control-label']) }}
                            <span class="required control-label">*</span>
                        </div>
                        <div class="col-lg-10">
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-2">
                            {{ Form::label('password_confirmation', 'Şifre tekrarı', ['class' => 'control-label']) }}
                        </div>
                        <div class="col-lg-10">
                            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
