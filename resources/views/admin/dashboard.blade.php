@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading test-center">
                    Posts
                </div>
                <div class="panel-body">
                <h1 class="text-center">{{ $posts_count }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-danger">
                <div class="panel-heading test-center">
                    Trashed Posts
                </div>
                <div class="panel-body">
                <h1 class="text-center">{{ $thrashed_count }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading test-center">
                    Category
                </div>
                <div class="panel-body">
                <h1 class="text-center">{{ $category_count }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading test-center">
                    Users
                </div>
                <div class="panel-body">
                <h1 class="text-center">{{ $users_count }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
