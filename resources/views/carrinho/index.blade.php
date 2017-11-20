@extends('layout')

@section('content')

    <!-- grow -->
    <div class="grow">
        <div class="container">
            <h2>Checkout</h2>
        </div>
    </div>
    <!-- grow -->
    <div class="container">
        <div class="check">
            <h1>Minha Lista ({{ $quantidade }})</h1>
            <div class="col-md-9 cart-items">

                <script>
                    $(document).ready(function (c) {
                        $('.close2').on('click', function (c) {

                            var item = $(this).data('item');
                            var token = $(this).data('token');

                            $.ajax({
                                method: "POST",
                                url: "/carrinho/remover",
                                data: {
                                    item: item,
                                    _token: token
                                }
                            });

                            $('.cart-header2').fadeOut('slow', function (c) {
                                $('.cart-header2').remove();
                            });

                            window.location.reload();
                        });
                    });
                </script>
                @foreach($carrinho as $item)
                    <div class="cart-header2">
                        <div data-item="{{ $item['id'] }}" data-token="{{ csrf_token() }}" class="close2"></div>
                        <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item cyc">
                                <img src="{{ $item['image'] }}" class="img-responsive" alt=""/>
                            </div>
                            <div class="cart-item-info">
                                <h3>
                                    <a href="{{ route('item', ['id' => $item['id'], 'nome' => $item['name']]) }}">{{ $item['name'] }}</a><span>Codigo: {{ $item['id'] }}</span>
                                </h3>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3 cart-total">
                <a class="continue" href="{{ route('produtos') }}">Continuar Comprado</a>
                <ul class="total_price">
                    <li class="last_price">
                        <h4>TOTAL</h4>
                    </li>
                    <li class="last_price"><span>{{ $total }}</span></li>
                    <div class="clearfix"></div>
                </ul>

                <div class="clearfix"></div>

                @if(\Illuminate\Support\Facades\Session::has('cart'))
                    <form method="POST" action="{{ route('carrinho_finalizar') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="order btn btn-success" href="#">Finalizar</button>
                    </form>
                @endif
            </div>

            <div class="clearfix"></div>
        </div>
    </div>


@endsection