@extends('cms.master')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
        <br>
            <div class="box box-danger">
                <div class="box-header with-border">
                <h3 class="box-title vertical-middle"><i class="fa fa-align-center"></i> {{ $location == 2 ? 'Manşet Sıralama' : 'Sürmanşet Sıralama' }}</h3>
                </div>
                <div class="box-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th style="width: 50px">Sırala</th>
                                <th style="width: 50px">Sıra</th>
                                <th style="min-width: 300px">Başlık</th>
                                <th style="width: 150px">Yayın Tarihi</th>
                                <th style="width: 80px">Hit</th>
                                <th style="width: 50px">İşlemler</th>
                            </tr>
                            <tbody id="sortable" data-action="{{ action('Cms\Post\PostSortingController@sort', ['location' => $location]) }}">
                                @php $i = 1 @endphp
                                @foreach ($posts as $post)
                                <tr id="item-{{ $post->id }}" class="alert alert-primary">                        
                                    <td class="vertical-middle sortable"><i class="fa fa-align-justify"></i></td>
                                    <td class="vertical-middle">{{ $i }}</td>
                                    <td class="vertical-middle">{{ $post->title }}</td>
                                    <td class="vertical-middle">{{ $post->published_at->format('d.m.Y H:i') }}</td>
                                    <td class="vertical-middle">{{ $post->hit }}</td>
                                    <td class="vertical-middle" width='5px'><a href="{{ $post->edit_link }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                                    <td class="vertical-middle" width='5px'><a href="{{ $post->delete_link }}" data-action="delete"><i  class="fa fa-trash-o fa-lg"></i></a></td>
                                </tr> 
                                @php $i++ @endphp    
                                @endforeach
                                @foreach ($other_posts as $post)
                                <tr id="item-{{ $post->id }}">                        
                                    <td class="vertical-middle sortable"><i class="fa fa-align-justify"></i></td>
                                    <td class="vertical-middle">{{ $i++ }}</td>
                                    <td class="vertical-middle">{{ $post->title }}</td>
                                    <td class="vertical-middle">{{ $post->published_at->format('d.m.Y H:i') }}</td>
                                    <td class="vertical-middle">{{ $post->hit }}</td>
                                    <td class="vertical-middle" width='5px'><a href="{{ $post->edit_link }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                                    <td class="vertical-middle" width='5px'><a href="{{ $post->delete_link }}" data-action="delete"><i  class="fa fa-trash-o fa-lg"></i></a></td>
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