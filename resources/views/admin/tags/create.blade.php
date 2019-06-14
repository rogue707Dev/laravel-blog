@extends('layouts.app')

@section('content')
    @include('includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create New Tag!
        </div>
        <div class="panel-body">
            <form action="{{ route('tag.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">
                        Tag
                    </label>
                    <input type="text" name="tag" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-success">Store Tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop