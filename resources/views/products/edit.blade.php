@extends('app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pull-right text-right">
                <a href="{{ url('products') }}" class="btn btn-primary">Back</a>                
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

                    {!! Form::open(['route'=>['products.update', $product->id], 'method'=>'put']) !!}
                        
                        <div class="form-group">
                            
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group">
                            
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}

                        </div>

                        <div class="row">
                            
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
                                      {!! Form::checkbox('recommend', (!empty($product->recommend)) ? "1" : "0", $product->recommend) !!} Recommend
                                    </label>
                                </div>

                            </div>
                            
                        </div>

                        <div class="form-group">
                            
                            <div class="pull-right text-right">
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
