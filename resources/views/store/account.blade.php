@extends('store.store')

@section('content')
    
    <div class="content">
        
        <h3 class="">Área do Cliente</h3>
        <hr>
        <div class="row">
            
            <div class="col-xs-12 text-right pull-right">
                <h3 class="title">Olá, {{ auth()->user()->name }}</h3>
                <br>                
            </div>

        </div>

        @forelse ($orders as $order)
            
            <div class="panel-group">

                <div class="panel panel-default">
                  <div class="panel-heading">Pedido: {{ $order->id }}</div>
                  <div class="panel-body">
                                            
                        <div class="col-xs-12">
                            
                            <h3>Itens da compra:</h3>

                            @foreach ($order->items as $item)
                                {{ $item->product->name }} <br>
                                {{ $item->qtd }} x {{ number_format($item->price,2,",",".") }} = R$ <strong>{{ number_format($item->total,2,",",".") }}</strong>
                                <br>
                            @endforeach

                        </div>

                  </div>

                  <br>

                </div>

            </div>
            
            <br>
            <br>

        @empty
            
            <div class="col-xs-12">
                  
                <h3 class="text-center">Nenhum pedido em Aberto!</h3>
                <br>
                <br>

            </div>

        @endforelse  

    </div>

@stop