@extends('layouts.app')

@section('content')
    @include('includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update User Profiles: {{ $user->name }}
        </div>
        <div class="panel-body">
            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">
                        Name
                    </label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">
                        New Password
                    </label>
                    <input type="password" name="password" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="avatar">
                        Image
                    </label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="facebook">
                        Facebook Profile
                    </label>
                    <input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="youtube">
                        Youtube Profile
                    </label>
                    <input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">
                        About You
                    </label>
                    <textarea name="about" id="about" cols="6" rows="10" class="form-control">{{ $user->profile->about }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-success">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@stop

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#about').summernote();
        });
    </script>
@stop