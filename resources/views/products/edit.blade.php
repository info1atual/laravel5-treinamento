@extends('layouts.default')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pull-right text-right">
                <a href="{{ route('products') }}" class="btn btn-primary">Back</a>                
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Product</div>

                <div class="panel-body">

                    EDIT | {{ $product->name }}
                    <hr>
                    @if ($errors->any())
                        
                        <ul class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    @endif

                    {!! Form::open(['route'=>['products.update', $product->id], 'method'=>'put', 'class'=>'form-horizontal']) !!}
                        
                        <div class="col-sm-4">

                            <div class="form-group">
                                
                                {!! Form::label('category_id', 'Category') !!}
                                {!! Form::select('category_id', $categories, @$product->category_id, ['class'=>'form-control']) !!}
     
                            </div>

                        </div>

                        <div class="col-sm-12">

                            <div class="form-group">
                                
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}

                            </div>

                        </div>

                        <div class="col-sm-12">

                            <div class="form-group">
                                
                                {!! Form::label('description', 'Description') !!}
                                {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}

                            </div>

                        </div>

                        <div class="col-sm-4">
                            
                            <div class="form-group">
                                
                                {!! Form::label('price', 'Price') !!}
                                {!! Form::text('price', Util::decimal2($product->price), ['class'=>'form-control']) !!}

                            </div>

                        </div>

                        <div class="col-sm-4">
                            
                            <div class="checkbox">
                                <label>
                                  {!! Form::checkbox('featured', (!empty($product->featured)) ? "1" : "0", $product->featured) !!} Featured
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  {!! Form::checkbox('recommended', (!empty($product->recommended)) ? "1" : "0", $product->recommended) !!} Recommended
                                </label>
                            </div>

                        </div>

                        <div class="col-sm-12">

                            <div class="form-group">
                                <?php $t = ''; ?>
                                @foreach ($tags as $tag) 
                                    <?php 
                                        $t = $t . $tag . ', '; 
                                    ?>
                                @endforeach

                                {!! Form::label('tags', 'Tags') !!}
                                {!! Form::textarea('tags', $t, ['class'=>'form-control', 'rows'=>4]) !!}

                            </div>

                        </div>
                        
                        <div class="col-sm-6 pull-right text-right">

                            <div class="form-group">
                                
                                <a href="{{ route('products') }}" class="btn btn-default">Cancelar</a>&nbsp;
                                {!! Form::submit('Save Product', ['class'=>'btn btn-primary pull-right']) !!}

                            </div>

                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
