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
                                <th></th>
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
                                                <span class="label label-warning">Aberto</span>
                                            @elseif ($order->status == 0) 
                                                <span class="text-success"><i class="fa fa-check"></i></span>
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            @if (intval($order->status) == 1)
                                                <a href="#" id="status" data-pedido="{{ $order->id }}"><i class="fa fa-edit fa-lg"></i></a>
                                            @else
                                                <a href="#" id="">&nbsp;&nbsp;</a>
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

    <!-- Modal -->
    
    {!! Form::open(array('route'=>'admin.pedidos.status', 'id'=>'form-status')) !!}
    
        <div class="modal" id="modal-status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            
            {!! Form::hidden('pedido', null, ['id'=>'pedido']) !!}
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Alterar Status</h4>
                </div>
                <div class="modal-body">
    
                    <div class="row">
                        
                        <div class="col-sm-12">
                            <p>Deseja realmente alterar o Status do Pedido para Finalizado?</p>                            
                        </div>
    
                    </div> <!-- fim row -->
    
                </div> <!-- fim modal-body -->
                
                <div class="modal-footer">
                    
                    <div class="row">
                                            
                        <div class="col-sm-6 pull-right text-right">
                            
                            {!! Form::submit('Sim', array('class'=>'btn btn-success', 'id'=>'bt-ok')) !!}
                            <a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Não</a>
                                
                        </div>
                        
                    </div> <!-- fim row -->
    
                </div> <!-- fim modal-footer -->
                
            </div> <!-- fim modal-content -->
            </div> <!-- fim modal-dialog -->
    
        </div> <!-- fim modal -->
    
    {!! Form::close() !!}

@stop

@section('scripts')
    
    <script>
        
        $("[id=status]").on('click', function() {
            $("#modal-status").modal("show");
            pedido = $(this).data('pedido');
            $("#pedido").val(pedido);
        });

    </script>

@stop