@extends('cms.master')

@section('content')
    <div class="content-wrapper">
        <div class="box box-danger">
            <div class="box-header with-border">
            <h3 class="box-title vertical-middle"><i class="fa fa-plus-square-o"></i> {{ $edit > 0 ? 'Haber Düzenle' : 'Yeni haber ekle' }}</h3>
            </div>

            <div class="box-body">
                <div class="col-lg-12">
                    {{
                        Form::open([
                            'url' => $edit > 0 ? action('Cms\Post\NewsController@update', $post->id) : action('Cms\Post\NewsController@store'),
                            'method' => $edit > 0 ? 'PUT' : 'POST'
                        ])
                    }}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('location', 'Yerleşim Yeri', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                @foreach ($location as $value => $name)
                                    {{ Form::radio('location', $value, $edit > 0 ? ($post->location == $value ? true : false) : ($name == 'Normal' ? true : false), ['class' => 'iradio']) }} {{ $name }}
                                @endforeach
                            </div>
                        </div>
                        </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('published_at', 'Yayınlanma Tarihi', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection