@extends('layouts.admin')

@section('title', 'List news')

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
                    <th>Detail</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $new)
                    <tr>
                        <td>{{ $new->title }}</td>
                        <td>{!! strip_tags(str_limit($new->content, 60)) !!}</td>
                        <td class="text-center"><img src="{{ asset('source/image/news/'. $new->file)}}" alt="picture" width="100"/></td>
                        <td class="text-center">{{ $new->author }}</td>
                        <td class="text-center"> <a href="{{route('detail', $new->id)}}">
                        <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i></a> </td>
                        <td class="text-center action-table" style="width:260px;">
                            <div class="btn-group">
                                <a href="{{route('editNews', $new->id)}}" type="button"
                                   class="btn btn-primary">Edit</a>
                            </div>
                            <div class="btn-group">
                                <a href="{{route('deleteNews', $new->id)}}" type="button"
                                    class="btn btn-danger" onclick="return confirm('Do you want to delete this?')">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">{{ $news->links() }}</div>
        @else
            <h2 class="no-result">No news</h2>
        @endif
    </div>
@stop