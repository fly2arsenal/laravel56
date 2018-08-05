@extends('layouts.admin')

@section('title', 'Detail news')

@section('content')
    @parent
    <div class="box">
        @if(count($news) > 0)
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Author</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $new)
                    <tr>
                        <td>{{ $new->title }}</td>
                        <td class="text-center">{!! $new->content !!}</td>
                        <td class="text-center"><img src="{{ asset('source/image/news/'. $new->file)}}" alt="picture" width="100"/></td>
                        <td class="text-center">{{ $new->author }}</td>
                        <th class="text-center">{{ $new->created_at->format('m/d/Y') }}</th>
                        <td class="text-center action-table" style="width:260px;">
                          <div class="fb-share-button btn-group" data-href="http://localhost.com/laravel56/admin/detail/{{$new->id}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" 
                            href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost.com%2Flaravel56%2Fadmin%2Fdetail&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="fb-comments" data-href="http://localhost.com/laravel56/admin/detail/{{$new->id}}" data-numposts="5"></div>
        @else
            <h2 class="no-result">No news</h2>
        @endif
    </div>
@stop