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
                            'method' => $edit > 0 ? 'PUT' : 'POST',
                            'onsubmit' => "return SendForm.init(this, '". $form_referrer . "');"
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
                            <div class="col-lg-10">
                                {{ Form::date('name', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('short_title', 'Kısa Başlık', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::text('short_title', $edit > 0 ? $post->short_title : '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                             <div class="col-lg-2">
                                 {{ Form::label('title', 'Başlık', ['class' => 'control-label']) }}
                                 <span class="required control-label">*</span>
                             </div>
                            <div class="col-lg-10">
                                {{ Form::text('title', $edit > 0 ? $post->title : '', ['class' => 'form-control']) }}
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
                                {{ Form::text('seo_title', $edit > 0 ? $post->seo_title : '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('summary', 'Özet', ['class' => ' control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::textarea('summary', $edit > 0 ? $post->summary : '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('content', 'Başlık', ['class' => 'control-label']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                {{ Form::textarea('content', $edit > 0 ? $post->content : '', ['class' => 'form-control', 'id' => 'editor']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('name', 'Editör', ['class' => 'control-label', 'placeholder' => 'Editör Seçin']) }}
                                <span class="required control-label">*</span>
                            </div>
                            <div class="col-lg-10">
                                    {{ Form::select('name', $users, null,['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('category', 'Kategori', ['class' => 'control-label']) }}
                            </div>
                            <div class="col-lg-10">
                                    {{ Form::select('category', $categories, $edit > 0 ? ($category->id == $post->category_id ? $post->category_id : '') : '', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label(null, 'Kapak Resmi', ['class' => 'control-label']) }}
                            </div>
                            <div class="col-lg-10">
                                {{ Form::file(null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Form::label('show_in_mainpage', 'Anasayfada', ['class' => 'control-label']) }}
                            </div>
                            <div class="col-lg-10">
                                @foreach($show_in_mainpage as $value => $name)
                                    {{ Form::radio('show_in_mainpage', $value, $edit > 0 ? ($post->show_in_mainpage == $value ? true : false) : ($name == 'Görünsün' ? true : false), ['class' => 'iradio']) }} {{ $name }}
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                 {{ Form::label('commentable', 'Yorum', ['class' => 'control-label']) }}
                            </div>
                            <div class="col-lg-10">
                                @foreach($commentable as $value => $name)
                                    {{ Form::radio('commentable', $value, $edit > 0 ? ($post->commentable == $value ? true : false) : ($name == 'Yapılsın' ? true : false), ['class' => 'iradio']) }} {{ $name }}
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
                                    {{ Form::radio('status', $value, $edit > 0 ? ($post->status == $value ? true : false) : ($name == 'Aktif' ? true : false), ['class' => 'iradio']) }} {{ $name }}
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

@section('js')
    <script type="text/javascript">
        CKEDITOR.replace('editor', {
            height:400
        });
    </script>
@endsection
