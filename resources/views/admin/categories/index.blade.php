@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Categories
        </div>
        <div class="panel-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>#Sl</th>
                        <th>Category Name</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </tr>
                </thead>
                <tbody>
                    @if($categories->count() > 0 )
                    @foreach ($categories as $key=>$category)
                    <tr>
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            {{ $category->name}}
                        </td>
                        <td>
                            <a href="{{ route('category.edit',['id'=>$category->id]) }}" class="btn btn-sm btn-info">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('category.delete',['id'=>$category->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @else 
                    <tr>
                        <th colspan="5" class="text-center text-primary">No Category yet!</th>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop