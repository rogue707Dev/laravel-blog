<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
               @if(Auth::check())
               <div class="col-lg-4">
                    <ul class="list-group">
                        {{-- <li class="list-group-item">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-info">Menu Bar</a>
                        </li> --}}
                        <li class="list-group-item">
                        <a href="{{ route('home') }}" class="btn btn-sm btn-default">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('categories') }}" class="btn btn-sm btn-default">Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('category.create') }}" class="btn btn-sm btn-default">Create New Category</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('tags') }}" class="btn btn-sm btn-default">Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('tag.create') }}" class="btn btn-sm btn-default">Create New Tag</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('posts')}}" class="btn btn-sm btn-default">Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('posts.trashed')}}" class="btn btn-sm btn-default">Trashed Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('post.create')}}" class="btn btn-sm btn-default">Create New Post</a>
                        </li> 
                        @if(Auth::user()->admin)
                        <li class="list-group-item">
                            <a href="{{route('users')}}" class="btn btn-sm btn-default">Users List</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('user.create')}}" class="btn btn-sm btn-default">Create New User</a>
                        </li>
                        @endif
                        <li class="list-group-item">
                            <a href="{{route('user.profiles')}}" class="btn btn-sm btn-default">User Profiles</a>
                        </li>
                        <li class="list-group-item">
                                <a href="{{route('settings')}}" class="btn btn-sm btn-default">Blog's Settings</a>
                            </li>
                    </ul>
                </div>
               @endif
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif

        @if(Session::has('info'))
            toastr.info('{{ Session::get('info') }}');
        @endif
    </script>

    @yield('scripts')
</body>
</html>
