@extends('layouts.app')

@section('content')
    @include('includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update Tag: {{ $tag->tag }}
        </div>
        <div class="panel-body">
            <form action="{{ route('tag.update',['id'=>$tag->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="tag">
                        Tag
                    </label>
                    <input type="text" name="tag" value="{{ $tag->tag }}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-success">Update Tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop