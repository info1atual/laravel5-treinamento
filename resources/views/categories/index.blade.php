@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pull-right text-right">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">New</a>                
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Categories</strong></div>

                <div class="panel-body">
                    LISTAGEM
                    <hr>

                    <table class="table">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    
                                    <a href="{{ route('categories.edit', ['id'=>$category->id]) }}">Edit</a>
                                    <a href="{{ route('categories.destroy', ['id'=>$category->id]) }}">Delete</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
