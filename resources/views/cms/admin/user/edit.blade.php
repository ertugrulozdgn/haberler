@extends('cms.master')
@section('content')
    <div class="content-wrapper">
        <div class='box box-danger'>
            <div class='box-header with-border'>
                <h3 class='box-title vertical-middle'><i class="fa fa-plus-square-o"></i> {{{ $edit > 0 ? 'Editör Düzenleme' : 'Yeni Editör Ekle' }}}</h3>
            </div>

            <div class="box-body">
                <div class="col-lg-12">
                    {{ Form::open([
                        'url' => $edit > 0 ? action('Cms\Admin\UserController@update', [$user->id]) : action('Cms\Admin\UserController@store'),
                        'method' => $edit > 0 ? 'PUT' : 'POST',
                        'files' => true
                    ]) }}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('name', 'Adı', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::text('name', $edit > 0 ? $user->name : '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('email', 'E-posta', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::text('email', $edit > 0 ? $user->email : '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('password', 'Şifre', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Şifreniz 8 ile 20 karakter Arasında Olmalıdır.']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('password_confirmation', 'Şifre tekrarı', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Lütfen Şifrenizi Tekrar Girin']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row" style="padding-bottom: 20px;">
                            <div class="col-lg-2">
                                {{ Form::label('active', 'Yetki', ['class' => 'control-label'])}}
                            </div>
                            <div class="col-10">
                                @foreach($situations as $key => $value)
                                    {{ Form::radio('active', $key, true, ['class' => 'iradio']) }} <span>{{ $value }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <button class="btn btn-primary" type="submit" value="save">Kaydet</button>
                        <button class="btn btn-primary" type="submit" value="save_and_continue">Kaydet ve Devam Et</button>
                        <a href="" class="btn btn-danger">Vazgeç</a>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
