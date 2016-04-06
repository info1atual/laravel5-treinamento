@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pull-right text-right">
                <a href="{{ route('products.create') }}" class="btn btn-primary">New</a>                
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Products</strong></div>

                <div class="panel-body">
                    LISTAGEM
                    <hr>
                    <table class="table">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td class="text-right"><strong><h4><small>$</small> {{ Util::decimal2($product->price) }}</h4></strong></td>
                                <td>{{ @$product->category->name }}</td>
                                <td>
                                    
                                    <a href="{{ route('products.edit', ['id'=>$product->id]) }}">Edit</a> | 
                                    <a href="{{ route('products.images', ['id'=>$product->id]) }}">Images</a> | 
                                    <a href="{{ route('products.destroy', ['id'=>$product->id]) }}">Delete</a> 

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        
                        {!! $products->render() !!}

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
