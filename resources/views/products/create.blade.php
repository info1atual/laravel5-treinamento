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
                <div class="panel-heading">Create Product</div>

                <div class="panel-body">

                    NEW

                    <?php // dd($categories); ?>
                    <hr>
                    @if ($errors->any())
                        
                        <ul class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    @endif

                    {!! Form::open(['route'=>'products.store', 'class'=>'form-horizontal']) !!}

                    <div class="col-sm-4">

                        <div class="form-group">
                            
                            {!! Form::label('category_id', 'Category') !!}
                            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
 
                        </div>
                    </div>
                        
                    <div class="col-sm-12">

                        <div class="form-group">
                            
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}

                        </div>

                    </div>

                    <div class="col-sm-12">

                        <div class="form-group">
                            
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}

                        </div>

                    </div>

                    <div class="col-sm-4">
                        
                        <div class="form-group">
                            
                            {!! Form::label('price', 'Price') !!}
                            {!! Form::text('price', null, ['class'=>'form-control']) !!}

                        </div>

                    </div>

                    <div class="col-sm-4">
                        
                        <div class="checkbox">
                            <label>
                              {!! Form::checkbox('featured', '1', '') !!} Featured
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                              {!! Form::checkbox('recommended', '1', '') !!} Recommended
                            </label>
                        </div>

                    </div>

                    <div class="col-sm-6 pull-right text-right">

                        <div class="form-group">
                            
                            <a href="{{ route('products') }}" class="btn btn-default">Cancelar</a>&nbsp;
                            {!! Form::submit('Add Product', ['class'=>'btn btn-primary pull-right']) !!}

                        </div>

                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
