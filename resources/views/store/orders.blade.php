@extends('layouts.store')

@section('content')
    
    <?php 

        // foreach ($orders as $order) {
        //     echo $order->id;
        // }
        // exit();
    ?>

    <div class="content">
        
        <h3 class="">Área do Cliente</h3>
        <hr>
        <div class="row">
            
            <div class="col-xs-12 text-right pull-right">
                <h3 class="title">Olá, {{ auth()->user()->name }}</h3>
                <br>                
            </div>

        </div>

        @if ($orders->count() > 0)
            
            <div class="panel-group">

                <div class="panel panel-default">
                  <div class="panel-heading">Pedidos</div>
                  <div class="panel-body">
                                            
                        <table class="table">
                            
                            <thead>
                                <th>Compra #ID</th>
                                <th>Itens</th>
                                <th class="text-center">Valor</th>
                                <th>Status</th>
                            </thead>

                            <tbody>

                                @foreach ($orders as $order)
                                    
                                    <tr>
                                        <td class="text-center">{{ $order->id }}</td>
                                        <td>
                                            @foreach ($order->items as $item)
                                                {{ $item->product->name }} <br>
                                            @endforeach
                                        </td>
                                        <td class="text-right"><strong>R$ {{ $order->total }}</strong></td>
                                        <td class="text-center">
                                            @if (intval($order->status) == 1)
                                                <span class="label label-success">Aberto</span>
                                            @elseif ($order->status == 0) 
                                                <span class="label label-danger">Finalizado</span>
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                                
                            </tbody>

                        </table>

                  </div>

                  <br>

                </div>

            </div>
            
            <br>
            <br>

        @else
            
            <div class="col-xs-12">
                  
                <h3 class="text-center">Nenhum pedido em Aberto!</h3>
                <br>
                <br>

            </div>

        @endif

    </div>

@stop