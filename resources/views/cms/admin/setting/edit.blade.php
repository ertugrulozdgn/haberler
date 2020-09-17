@extends('cms.master')

@section('content')
    <div class="content-wrapper">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title vertical-middle"><i class="fa fa-plus-square-o"></i> Ayar Düzenleme</h3>
            </div>

            <div class="box-body">
                <div class="col-lg-12">
                    {{ Form::open([
                        'url' => action('Cms\Admin\SettingController@update', $setting->id),
                        'method' => 'PUT',
                        'onsubmit' => "return SendForm.init(this, '". $form_referrer . "');"
                        ])
                    }}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('value', $setting->name . ':', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::textarea('value', $setting->value, ['class' => 'form-control', 'id' => 'editor']) }}
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <button class="btn btn-primary" type="submit">Kaydet</button>
                    <a href="{{ action('Cms\Admin\PageController@index') }}" class="btn btn-danger">Vazgeç</a>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
