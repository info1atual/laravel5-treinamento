@extends('layouts.store')

@section('content')
    
    <div class="row">
        
        <div class="col-sm-9 padding-right">
            <h3>Sucesso!</h3>
            <p>O pedido #{{ $order->id }} foi finalizado com sucesso.</p>
        </div>
        
    </div>

    <div class="row">
        
        <div class="col-sm-6 text-right pull-right">
            <a href="{{ route('account.orders') }}" class="btn btn-info">Área do Cliente</a>
        </div>

    </div>

    <br>

@stop