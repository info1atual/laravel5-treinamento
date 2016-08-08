@extends('layouts.store')

@section('content')

    <section class="cart_items">
        
        <div class="row">
            
            <div class="col-sm-6 pull-right text-right">
                <a href="{{ route('home') }}" class="btn btn-success">Voltar a Loja</a>
            </div>

        </div>

        <div class="container">
            
            <h2>Carrinho</h2>

            <?php 
                // dd($cart->all()); 
            ?>

            <div class="table-responsive cart_info">
                
                <table class="table table-condensed">
                    
                    <thead>
                        <tr class="cart_menu">
                            <th>Imagem</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th></th>
                            <th>Valor</th>
                            <th>SubTotal</th>
                            <th></th>
                        </tr>   
                    </thead>

                    <tbody id="itens">
                        
                        @forelse ($cart->all() as $k => $item)
                            
                            <tr id="itens-linha">
                                <td class="col-xs-1 cart_product">
                                    @if (!empty($item['img']))
                                        <img src="{{ asset('uploads/'.$item['img']) }}" width="30px" alt="" />
                                    @else
                                        <img src="{{ asset('images/no-img.jpg') }}" width="30px" alt="" />
                                    @endif
                                </td>
                                <td class="cart_description col-xs-3">
                                    <a href="{{ route('store.product', $k) }}"><h4>{{ $item['name'] }}</h4></a>
                                    <span>Código: {{ $k }}</span>
                                </td>
                                <td class="cart_quantity col-xs-1" id="area-quantidade">
                                    <div class="form-group">
                                        <input type="number" class="form-control text-center" id="quantidade" value="{{ $item['qtd'] }}">
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <a href="#" class="btn btn-info" id="atualizar" style="margin-top: -16px" data-id="{{ $k }}" class="cart_update">
                                        Atualizar
                                    </a>
                                </td>
                                <td class="col-xs-2 cart_price text-right">
                                    <h4>R$ {{ number_format($item['price'], 2,",",".") }}</h4>
                                </td>
                                <td class="col-xs-2 cart_price text-right">
                                    <h4>R$ {{ number_format($item['price'] * $item['qtd'], 2,",",".") }}</h4>
                                </td>
                                <td class="col-xs-2 text-center">
                                    <a href="{{ route('cart.remove', $k) }}" style="margin-top: -16px" class="btn btn-info">
                                        Excluir
                                    </a>
                                </td>
                            </tr>

                        @empty
                            
                            <tr class="text-center">
                                
                                <td colspan="6">
                                    <h4>Nenhum item adicionado!</h4> 
                                </td>

                            </tr>

                        @endforelse

                        <tr>
                            
                            <td class="col-sm-12" colspan="8">
                                
                                <div class="row">
                                    <hr>
                                </div>

                                <div class="row text-right">
                                    <span>Total: R$ </span>
                                    <span>
                                        <strong>{{ number_format($cart->getTotal(), 2,",",".") }} </strong>
                                    </span>
                                    <a href="{{ route('store.checkout.place') }}" class="btn btn-success">Fecha a Conta</a>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>
            
        </div>

    </section>

@stop

@section('scripts')
    
    <script>
        
        jQuery(document).ready(function($) {
                
            $('#itens').on('click', '#atualizar', function(e) {
                e.preventDefault();

                id = $(this).data('id')
                qtd = $(this).parent().parent().children('#area-quantidade').children().children('#quantidade').val()
                window.location.href = '{{ url("/") }}' + '/store/cart/' + id + '/' + qtd + '/update' 

            });
            
        });

    </script>

@stop
