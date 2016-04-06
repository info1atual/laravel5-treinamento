@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pull-right text-right">
                <a href="{{ route('products') }}" class="btn btn-default">Back</a>
                <a href="{{ route('products.images.create', $product->id) }}" class="btn btn-primary">New Image</a>                
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Images of {{ $product->name }}</strong></div>

                <div class="panel-body">
                    LISTAGEM
                    <hr>
                    <table class="table">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Extension</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($product->images as $image)
                            <tr>
                                <td class="text-center">{{ $image->id }}</td>
                                <td>
                                    <?php // ?>
                                    
                                    <img width="80px" src="{{ url('uploads' . '/' . $image->id . '.' . $image->extension) }}" alt="">
                                </td>
                                <td class="text-center">{{ $image->extension }}</td>
                                <td>
                                    <a href="{{ route('products.images.destroy', ['id'=>$image->id]) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
