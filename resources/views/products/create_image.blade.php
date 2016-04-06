@extends('layouts.default')

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
                <div class="panel-heading">Create Image</div>

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

                    {!! Form::open(['route'=>['products.images.store', $product->id], 'class'=>'form-horizontal', 'files'=>true]) !!}


                        <div class="col-sm-12">

                            <div class="form-group">
                                
                                {!! Form::label('category_id', 'Image') !!}
                                {!! Form::file('image', null, ['class'=>'form-control']) !!}
     
                            </div>
                        
                        </div>
                        
                        <div class="row"></div>
                        <hr>

                        <div class="col-sm-12 pull-right text-right">

                            <div class="form-group">
                                
                                <a href="{{ route('products') }}" class="btn btn-default">Cancelar</a>&nbsp;
                                {!! Form::submit('Add Images', ['class'=>'btn btn-primary pull-right']) !!}

                            </div>

                        </div>


                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
