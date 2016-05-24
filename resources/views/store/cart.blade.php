@extends('store.store')

@section('content')
    

    <section class="cart_items">
    	
    	<div class="container">
    		
    		<h2>Carrinho</h2>

    		<?php // dd($cart->all()); ?>

    		<div class="table-responsive cart_info">
    			
    			<table class="table table-condensed">
    				
    				<thead>
    					<tr class="cart_menu">
    						<th>Imagem</th>
    						<th>Descrição</th>
    						<th>Quantidade</th>
    						<th>Preço</th>
    						<th>Valor</th>
    						<th>SubTotal</th>
    						<th></th>    						
    					</tr>	
    				</thead>

    				<tbody id="itens">
    					
    					@forelse ($cart->all() as $k => $item)
    					<tr id="itens-linha">
    						<td class="cart_product">
    							@if (!empty($item['img']))
					            	<img src="{{ asset('uploads/'.$item['img']) }}" width="30px" alt="" />
				            	@else
				            		<img src="{{ asset('images/no-img.jpg') }}" width="30px" alt="" />
				            	@endif
    						</td>
    						<td class="cart_description col-xs-4">
								<a href="{{ route('store.product', $k) }}"><h4>{{ $item['name'] }}</h4></a>
								<span>Código: {{ $k }}</span>
    						</td>
    						<td class="cart_quantity col-xs-2" id="area-quantidade">
    							<div class="form-group">
									<input type="number" class="form-control text-center" id="quantidade" value="{{ $item['qtd'] }}">
    							</div>
							</td>
							<td>
								<a href="#" id="atualizar" data-id="{{ $k }}" class="cart_update">
									Atualizar
    							</a>
							</td>
							<td class="cart_price text-right">
								<h4>R$ {{ number_format($item['price'], 2,",",".") }}</h4>
							</td>
							<td class="cart_price text-right">
								<h4>R$ {{ number_format($item['price'] * $item['qtd'], 2,",",".") }}</h4>
							</td>
    						<td class="cart_delete text-center">
    							<a href="{{ route('cart.remove', $k) }}" class="cart_quantity_delete">
									Excluir
    							</a>
    						</td>
    					</tr>
    					@empty
							
							<tr class="text-center">
								<td>
									<h4>Nenhum item adicionado!</h4>									
								</td>
							</tr>

    					@endforelse

    					<tr>
    						
    						<td colspan="6">
    							
    							<div class="text-right">
    								
    								<span>Total: R$ </span>
    								{{ number_format($cart->getTotal(), 2,",",".") }}

    								<a href="#" class="btn btn-success">Fecha a Conta</a>

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
	    		window.location.href = '{{ url() }}' + '/store/cart/' + id + '/' + qtd + '/update' 

	    	});
	    	
    	});

    </script>

@stop
