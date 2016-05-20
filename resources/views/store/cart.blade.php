@extends('store.store')

@section('content')
    

    <section class="cart_items">
    	
    	<div class="container">
    		
    		<h2>Carrinho</h2>

    		<?php // dd($cart->all()); ?>

    		<div class="table-responsive cart_info">
    			
    			<table class="table-condensed">
    				
    				<thead>
    					<tr class="cart_menu">
    						<th>Imagem</th>
    						<th>Descrição</th>
    						<th>Quantidade</th>
    						<th>Preço</th>
    						<th>Total</th>
    						<th></th>    						
    					</tr>	
    				</thead>

    				<tbody>
    					
    					@forelse ($cart->all() as $k => $item)
    					<tr>
    						<td class="cart_product">
					            <img src="{{ asset('images/no-img.jpg') }}" alt="" />
    						</td>
    						<td class="cart_description">
								<h4>{{ $item['name'] }}</h4>
								<span>Código: {{ $k }}</span>
    						</td>
    						<td class="cart_quantity">
								<a href="{{ route('store.product') }}">{{ $item['qtd'] }}</a>
							</td>
							<td class="cart_price">
								<a href="{{ route('store.product') }}">R$ {{ $item['price'] }}</a>
							</td>
    						<td class="cart_delete">
    							<a href="#" class="cart_quantity_delete">
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
    				</tbody>

    			</table>
    		</div>
    		
    	</div>

    </section>

@stop