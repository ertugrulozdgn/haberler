@extends('cms.master')

@section('content')
    <div class="content-wrapper">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title vertical-middle"><i class="fa fa-plus-square-o"></i>{{ $edit > 0 ? 'Sayfa Düzenleme' : 'Sayfa Ekleme' }}</h3>
            </div>

            <div class="box-body">
                <div class="col-lg-12">
                    {{ Form::open([
                        'url' => $edit > 0 ? action('Cms\Admin\PageController@update', $page->id) : action('Cms\Admin\PageController@store'),
                        'method' => $edit > 0 ? 'PUT' : 'POST',
                        ])
                    }}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('title', 'Başlık') }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::text('title', $edit > 0 ? ($page->title) : '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('content', 'İçerik') }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::textarea('content', $edit > 0 ? ($page->content) : '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('show_in_footer', 'Footer da göster', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                @foreach($show_in_footer as $value => $name)
                                    {{ Form::radio('show_in_footer', $value, $edit > 0 ? ($page->show_in_footer == $value ? true : false) : ($value == 1 ? true : false), ['class' => 'iradio']) }} <span>{{ $name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('status', 'Durum', ['class' => 'control-label']) }}
                            </div>
                            <div class="col-lg-10">
                                @foreach($status as $value => $name)
                                    {{ Form::radio('status', $value, $edit > 0 ? ($page->status == $value ? true : false) : ($value == 1 ? true : false), ['class' => 'iradio']) }} {{ $name }}
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
