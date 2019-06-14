@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Trashed Posts
        </div>
        <div class="panel-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>#Sl</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Restore</th>
                        <th>Destroy</th>
                    </tr>
                </thead>
                <tbody>
                    @if($posts->count() > 0 )
                    @foreach ($posts as $key=>$post)
                    <tr>
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            <img src="{{ $post->featured}}" alt="{{ $post->title}}" width="90px" height="50px">
                        </td>
                        <td>
                            {{ $post->title}}
                        </td>
                        <td>
                            <a href="{{ route('post.restore',['id'=>$post->id]) }}" class="btn btn-sm btn-success">Restore</a>
                        </td>
                        <td>
                            <a href="{{ route('post.kill',['id'=>$post->id]) }}" class="btn btn-sm btn-danger">Destroy</a>
                        </td>
                    </tr>
                    @endforeach
                    @else 
                    <tr>
                        <th colspan="5" class="text-center text-primary">No Trashed Post Available!</th>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop