@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Tags
        </div>
        <div class="panel-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>#Sl</th>
                        <th>Tag Name</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </tr>
                </thead>
                <tbody>
                    @if($tags->count() > 0 )
                    @foreach ($tags as $key=>$tag)
                    <tr>
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            {{ $tag->tag}}
                        </td>
                        <td>
                            <a href="{{ route('tag.edit',['id'=>$tag->id]) }}" class="btn btn-sm btn-info">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('tag.delete',['id'=>$tag->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @else 
                    <tr>
                        <th colspan="5" class="text-center text-primary">No Tag yet!</th>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop