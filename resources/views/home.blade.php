@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ route('admin.pedidos') }}" class="btn btn-warning btn-block well-sm">Pedidos</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="{{ route('admin.products') }}" class="btn btn-primary btn-block well-sm">Produtos</a>
                        </div>                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ route('admin.categories') }}" class="btn btn-primary btn-block well-sm">Categorias</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
