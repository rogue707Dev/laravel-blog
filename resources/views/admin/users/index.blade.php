@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Users
        </div>
        <div class="panel-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>#Sl</th>
                        <th>Image</th>
                        <th>User Name</th>
                        <th>Permission</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users->count() > 0 )
                    @foreach ($users as $key=>$user)
                    <tr>
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            <img src=" {{ asset($user->profile->avatar) }}" width="50px" height="50px" style="border-radius: 50%" alt="{{ $user->name}}">
                        </td>
                        <td>
                            {{ $user->name}}
                        </td>
                        <td>
                            @if($user->admin)
                                <a href="{{ route('user.not.admin',['id'=>$user->id]) }}" class="btn btn-sm btn-warning">Remove Permissions</a>
                            @else 
                                <a href="{{ route('user.admin',['id'=>$user->id]) }}" class="btn btn-sm btn-success">Make Admin</a>
                            @endif
                            
                        </td>
                        <td>
                            @if(Auth::id() !== $user->id)
                                <a href="{{ route('user.delete',['id'=>$user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else 
                    <tr>
                        <th colspan="5" class="text-center text-primary">No Users yet!</th>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop