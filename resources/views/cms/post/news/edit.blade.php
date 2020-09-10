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
                            'files' => true,
                            'onsubmit' => "return SendForm.init(this, '". $form_referrer . "');"
                        ])
                    }}
                    

                    <div id="response-status"></div>


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
                                    {{-- {{ Form::input('date', 'published_at', \Carbon\Carbon::now()->format('d-m-Y'), ['class' => 'form-control']) }} --}}
                                    {{ Form::text('published_at', $edit > 0 ? $post->published_at->format('d-m-Y H:i') : \Carbon\Carbon::now()->format('d-m-Y H:i'), ['class' => 'form-control'] ) }}
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
                                    <span class="help-block">Bütün listelerde görünecek başlık</span>
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
                                    <span class="help-block">Detay sayfada görünecek başlık(Boş bırakılırsa kısa başlık eklenecektir).</span>
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
                                    <span class="help-block">Detay sayfalarda meta olarak görünecek başlık(Boş bırakılırsa başlık(başlık da boş ise kısa başlık) eklenecektir).</span>
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
                                    {{ Form::textarea('summary', $edit > 0 ? $post->summary : '', ['class' => 'form-control', 'rows' => 6]) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2">
                                    {{ Form::label('content', 'İçerik', ['class' => 'control-label']) }}
                                    <span class="required control-label">*</span>
                                </div>
                                <div class="col-lg-10">
                                    {{ Form::textarea('content', $edit > 0 ? $post->content : '', ['class' => 'form-control', 'id' => 'editor']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="padding-bottom: 10px;">
                                <div class="col-lg-2">
                                    {{ Form::label('editor_id', 'Editör', ['class' => 'control-label']) }}
                                    <span class="required control-label">*</span>
                                </div>
                                <div class="col-lg-10" style="margin-top: 10px">
                                    {{ Form::select('editor_id', $users, null,['class' => 'form-control select2']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2">
                                    {{ Form::label('category_id[]', 'Kategori', ['class' => 'control-label']) }}
                                </div>
                                <div class="col-lg-10">
                                    {{ Form::select('category_id[]', $categories, $edit > 0 ? ($category->id == $post->category_id ? $post->category_id : '') : '', ['class' => 'form-control multiselect', 'id' => 'my-select', 'multiple' => 'multiple']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row" style="height: 260px">
                                <div class="col-lg-2">
                                    {{ Form::label('cover_img', 'Kapak Resmi', ['class' => 'control-label']) }}
                                </div>
                                <div class="col-lg-10">
                                    <input type="file" class="select_image" name="cover_img" id="cover_img" style="margin: 10px 0 10px 0" />
                                    <img style="height: 195px" class="target" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row" style="height: 260px">
                                <div class="col-lg-2">
                                    {{ Form::label('headline_img', 'Manşet Resmi', ['class' => 'control-label']) }}
                                    <span class="required control-label">*</span>
                                </div>
                                <div class="col-lg-10">
                                    <input type="file" class="select_image" name="headline_img" id="headline_img" style="margin: 10px 0 10px 0" />
                                    <img style="height: 195px" class="target" />
                                </div>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2">
                                    {{ Form::label('redirect_link', 'Yönlendirme Linki', ['class' => 'control-label']) }}
                                </div>
                                <div class="col-lg-10">
                                    {{ Form::text('redirect_link', $edit > 0 ? $post->redirect_link : '', ['class' => 'form-control']) }}
                                    <span class="help-block">Haber buraya yazdığınız adrese otomatik olarak yönlenir.</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2">
                                    {{ Form::label('show_in_mainpage', 'Anasayfada', ['class' => 'control-label', 'style' => 'padding-bottom:15px']) }}
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
                                    {{ Form::label('commentable', 'Yorum', ['class' => 'control-label' , 'style' => 'padding-bottom:15px']) }}
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
                                    {{ Form::label('status', 'Durum', ['class' => 'control-label', 'style' => 'padding-bottom:15px']) }}
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
                            <a href="{{ action('Cms\Post\NewsController@index') }}" class="btn btn-danger">Vazgeç</a>
                        </div>

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@endsection

