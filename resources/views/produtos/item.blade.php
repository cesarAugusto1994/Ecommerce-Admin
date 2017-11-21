@extends('layout')

@section('content')
<div class="grow">
	<div class="container">
		<h2>Single</h2>
	</div>
</div>
<!-- grow -->
<div class="product">
	<div class="container">

		<div class="product-price1">
			<div class="top-sing">
				<div class="col-md-7 single-top">
					<div class="flexslider">
						<ul class="slides">
							@foreach($produto->imagens as $imagem)
								<li data-thumb="{{ $imagem['link'] }}">
									<div class="thumb-image"> <img src="{{ $imagem['link'] }}" title="{{ $imagem['titulo'] }}" data-imagezoom="true" class="img-responsive"> </div>
								</li>
							@endforeach
						</ul>
					</div>

					<div class="clearfix"> </div>
					<!-- slide -->


					<!-- FlexSlider -->
					<script defer src="/js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />

					<script>
						// Can also be used with $(document).ready()
                        $(window).load(function() {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });

					</script>
				</div>
				<div class="col-md-5 single-top-in simpleCart_shelfItem">
					<div class="single-para ">
						<h4>{{ $produto->nome }}</h4>
						<div class="star-on">

							<div class="review">
								<a href="#"> 1 customer review </a>

							</div>
							<div class="clearfix"> </div>
						</div>

						<h5 class="item_price">R$ {{ $produto->valor }}</h5>

						<p>{{ $produto->descricao }} </p>

						@if($produto->quantidade > 0)
							<a href="{{ route('carrinho') }}" data-produto="{{ $produto->id }}" data-quantidade="1" class="add-cart item_add"
							   data-token="{{ csrf_token() }}">Adicionar ao Carrinho</a>
						@else
							<div class="alert alert-danger"><p class="text-center">PRODUTO ESGOTADO :(</p></div>
						@endif

					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!---->

			<div class=" bottom-product">
				@foreach($sugestoes as $produto)
					<div class="col-md-4 bottom-cd simpleCart_shelfItem">
						<div class="product-at ">
							<a href="{{ route('item', ['id' => $produto->id,'nome' => $produto->nome]) }}"><img class="img-responsive" src="{{ $produto->imagens()->first()['link'] }}" alt="">
								<div class="pro-grid">
											<span class="buy-in">Comprar</span>
								</div>
							</a>
						</div>
						<p class="tun"><span>{{ $produto->nome }}</span><br>{{ $produto->categoria->nome }}</p>
						<div class="ca-rt">
							<a href="#" class="item_add">
								<p class="number item_price"><i> </i>R$ {{ $produto->valor }}</p>
							</a>
						</div>
					</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="clearfix"> </div>
	</div>
</div>
@endsection