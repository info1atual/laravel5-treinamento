@extends('layouts.default')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pull-right text-right">
                <a href="{{ route('categories') }}" class="btn btn-primary">Back</a>                
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create Category</div>

                <div class="panel-body">

                    NEW
                    <hr>
                    @if ($errors->any())
                        
                        <ul class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    @endif

                    {!! Form::open(['route'=>'categories.store']) !!}
                        
                        <div class="form-group">
                            
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group">
                            
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group">
                            
                            <div class="pull-right text-right">
                                <a href="{{ route('categories') }}" class="btn btn-default">Cancelar</a>&nbsp;
                                {!! Form::submit('Add Category', ['class'=>'btn btn-primary pull-right']) !!}
                            </div>
                            
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
