@extends('layout')

@section('content')

<!-- products -->
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Produtos</h2>
		</div>
	</div>
	<!-- grow -->
	<div class="pro-du">
		<div class="container">
			<div class="col-md-9 product1">
				<div class=" bottom-product">

					@foreach($produtos as $produto)
						<div class="col-md-6 bottom-cd simpleCart_shelfItem">
							<div class="product-at ">
								<a href="{{ route('item', ['id' => $produto->id,'nome' => $produto->nome]) }}"><img class="img-responsive" style="max-height: 320px;max-width: 320px;min-height: 320px;min-width: 320px" src="{{ $produto->imagens->first()['link'] }}" alt="">
								<div class="pro-grid">
											<span class="buy-in">Comprar</span>
								</div>
							</a>
							</div>
							<p class="tun"><span>{{ $produto->nome }}</span><br>{{ $produto->marca->nome }}</p>
							<div class="ca-rt">
								<a href="#" class="item_add"><p class="number item_price"><i> </i>R${{ $produto->valor }}</p></a>
							</div>
							<div class="clearfix"></div>
						</div>

					@endforeach
						<div class="clearfix"> </div>

				</div>
				</div>
			<div class="col-md-3 prod-rgt">
				<div class=" pro-tp">
					<div class="pl-lft">
						<a href="single.html"><img class="img-responsive" src="/images/l2.jpg" alt=""></a>
					</div>
					<div class="pl-rgt">
						<h6><a href="single.html">TRIBECA LIVING</a></h6>
						<p><a href="single.html">450$</a></p>
					</div>
						<div class="clearfix"></div>
				</div>
				<div class=" pro-tp">
					<div class="pl-lft">
						<a href="single.html"><img class="img-responsive" src="/images/l3.jpg" alt=""></a>
					</div>
					<div class="pl-rgt">
						<h6><a href="single.html">TRIBECA LIVING</a></h6>
						<p><a href="single.html">450$</a></p>
					</div>
						<div class="clearfix"></div>
				</div>
				<div class=" pro-tp">
					<div class="pl-lft">
						<a href="single.html"><img class="img-responsive" src="/images/l1.jpg" alt=""></a>
					</div>
					<div class="pl-rgt">
						<h6><a href="single.html">TRIBECA LIVING</a></h6>
						<p><a href="single.html">450$</a></p>
					</div>
						<div class="clearfix"></div>
				</div>

			</div>
				<div class="clearfix"></div>
		</div>
	</div>
<!-- products -->
@endsection