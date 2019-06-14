@extends('layouts.app')

@section('content')
    @include('includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update Blog Settings: {{ $setting->site_name }}
        </div>
        <div class="panel-body">
            <form action="{{ route('setting.update',['id'=>$setting->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">
                        Site Name
                    </label>
                    <input type="text" name="site_name" value="{{ $setting->site_name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">
                        Contact Email
                    </label>
                    <input type="email" name="email" value="{{ $setting->email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">
                        Contact Phone
                    </label>
                    <input type="text" name="phone" value="{{ $setting->phone }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="office_hour">
                        Office Hour
                    </label>
                    <input type="text" name="office_hour" value="{{ $setting->office_hour }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">
                       Address
                    </label>
                    <textarea name="address"  cols="5" rows="4" class="form-control">{{ $setting->address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="about">
                        Address 02
                    </label>
                    <textarea name="address_02"  cols="5" rows="4" class="form-control">{{ $setting->address_02 }}</textarea>
                </div>
                <div class="form-group">
                    <label for="about">
                        About
                    </label>
                    <textarea name="about" id="address" cols="6" rows="6" class="form-control">{{ $setting->about }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-success">Update Blog's Settings</button>
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
            $('#address').summernote();
        });
    </script>
@stop