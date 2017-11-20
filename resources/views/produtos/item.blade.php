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

						<a data-produto="{{ $produto->id }}" data-quantidade="1" class="add-cart item_add" data-token="{{ csrf_token() }}">Adicionar ao Carrinho</a>

					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!---->

			<div class=" bottom-product">
				<div class="col-md-4 bottom-cd simpleCart_shelfItem">
					<div class="product-at ">
						<a href="#"><img class="img-responsive" src="/images/pi3.jpg" alt="">
							<div class="pro-grid">
										<span class="buy-in">Buy Now</span>
							</div>
						</a>
					</div>
					<p class="tun"><span>Lorem ipsum establish</span><br>CLARISSA</p>
					<div class="ca-rt">
						<a href="#" class="item_add">
							<p class="number item_price"><i> </i>$500.00</p>
						</a>
					</div>
				</div>
				<div class="col-md-4 bottom-cd simpleCart_shelfItem">
					<div class="product-at ">
						<a href="#"><img class="img-responsive" src="/images/pi1.jpg" alt="">
							<div class="pro-grid">
										<span class="buy-in">Buy Now</span>
							</div>
						</a>
					</div>
					<p class="tun"><span>Lorem ipsum establish</span><br>CLARISSA</p>
					<div class="ca-rt">
						<a href="#" class="item_add">
							<p class="number item_price"><i> </i>$500.00</p>
						</a>
					</div>
				</div>
				<div class="col-md-4 bottom-cd simpleCart_shelfItem">
					<div class="product-at ">
						<a href="#"><img class="img-responsive" src="/images/pi4.jpg" alt="">
							<div class="pro-grid">
										<span class="buy-in">Buy Now</span>
							</div>
						</a>
					</div>
					<p class="tun"><span>Lorem ipsum establish</span><br>CLARISSA</p>
					<div class="ca-rt">
						<a href="#" class="item_add">
							<p class="number item_price"><i> </i>$500.00</p>
						</a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="clearfix"> </div>
	</div>
</div>
@endsection