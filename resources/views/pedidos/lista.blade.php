@extends('layout')

@section('content')

    <div class="grow">
        <div class="container">
            <h2>Meus Pedidos</h2>
        </div>
    </div>

    <div class="container">
        <div class="check">
            @foreach($pedidos as $pedido)
                <h1>Pedido no. {{ $pedido->id }}</h1>
                <p class="lead">Cliente {{ $pedido->usuario->name }}</p>
                <p class="lead">Valor {{ $pedido->valor }}</p>
            <br>
                <div class="clearfix"></div>
                <div class="col-md-12 cart-items">
                    @foreach($pedido->produtos as $produto)
                        <div class="cart-header2">
                            <div class="cart-sec simpleCart_shelfItem">
                                <div class="cart-item cyc">
                                    <img src="{{ $produto->produto->imagens()->first()['link'] }}" class="img-responsive" alt=""/>
                                </div>
                                <div class="cart-item-info">
                                    <h3>
                                        <a href="{{ route('item', ['id' => $produto->produto->id, 'nome' => $produto->produto->id]) }}">{{ $produto->produto->nome }}</a><span>Codigo: {{ $produto->produto->id }}</span>
                                    </h3>
                                </div>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
                <div class="clearfix"></div>
        </div>
    </div>

@endsection