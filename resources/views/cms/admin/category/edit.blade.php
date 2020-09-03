@extends('cms.master')

@section('content')
    <div class="content-wrapper">
        <div class='box box-danger'>
            <div class='box-header with-border'>
                <h3 class='box-title vertical-middle'><i class="fa fa-plus-square-o"></i> {{{ $edit > 0 ? 'Kategori Düzenleme' : 'Yeni Kategori Ekle' }}}</h3>
            </div>

            <div class="box-body">
                <div class="col-lg-12">
                    {{
                        Form::open([
                            'url' => $edit > 0 ? action('Cms\Admin\CategoryController@update', [$category->id]) : action('Cms\Admin\CategoryController@store'),
                            'method' => $edit > 0 ? 'PUT' : 'POST',
                            'onsubmit' => "return SendForm.init(this, '". $form_referrer . "');"
                        ])
                    }}

                    <div id="response-status"></div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('name', 'Kategori Adı', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::text('name', $edit > 0 ? $category->name : '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('seo_title', 'Seo Başlık', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::text('seo_title', $edit > 0 ? $category->seo_title : '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('seo_description', 'Seo Açıklama', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::textarea('seo_description', $edit > 0 ? $category->seo_description : '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row" style="padding-bottom: 20px;">
                            <div class="col-lg-2">
                                {{ Form::label('show_in_menu', 'Menüde Göster', ['class' => 'control-label'])}}
                            </div>
                            <div class="col-10">
                                @foreach($show_in_menu as $value => $name)
                                    {{ Form::radio('show_in_menu', $value, $edit > 0 ? ($category->show_in_menu == $value ? true : false) : ($name == 'Göster' ? true : false), ['class' => 'iradio']) }} <span>{{ $name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row" style="padding-bottom: 20px;">
                            <div class="col-lg-2">
                                {{ Form::label('status', 'Durum', ['class' => 'control-label'])}}
                            </div>
                            <div class="col-10">
                                @foreach($status as $value => $name)
                                    {{ Form::radio('status', $value, $edit > 0 ? ($category->status == $value ? true : false) : ($name == 'Aktif' ? true : false), ['class' => 'iradio']) }} <span>{{ $name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    

                    <div class="container">
                        <button class="btn btn-primary" type="submit">Kaydet</button>
                        <a href="{{ action('Cms\Admin\CategoryController@index') }}" class="btn btn-danger">Vazgeç</a>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
