@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="banner">
        <div class="container">
            <script src="/js/responsiveslides.min.js"></script>
            <script>
                $(function () {
                    $("#slider").responsiveSlides({
                        auto: true,
                        nav: true,
                        speed: 500,
                        namespace: "callbacks",
                        pager: true,
                    });
                });
            </script>
            <div id="top" class="callbacks_container">
                <ul class="rslides" id="slider">
                    <li>

                        <div class="banner-text">
                            <h3>Seu E-Commerce </h3>
                            <p>Aqui encontrara tudo o que precisar.</p>

                        </div>

                    </li>
                    <li>

                        <div class="banner-text">
                            <h3>Produtos </h3>
                            <p>Todas as Marcas do mercado.</p>


                        </div>

                    </li>
                    <li>
                        <div class="banner-text">
                            <h3>Compre j&aacute;</h3>
                            <p>Nao perca as nossas promocoes.</p>


                        </div>

                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="cont">
            <div class="content">
                <div class="content-top-bottom">
                    <h2>DESTAQUES</h2>
                    <div class="col-md-6 men">
                        <a href="{{ route('item', ['id' => 1, 'nome' => 'Item']) }}"
                           class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="/images/t1.jpg" alt="">
                            <div class="b-wrapper">
                                <h3 class="b-animate b-from-top top-in   b-delay03 ">
                                    <span>TRIBECA LIVING</span>
                                </h3>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6">

                        <div class="col-md1 ">
                            <a href="{{ route('item', ['id' => 1, 'nome' => 'Item']) }}"
                               class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="/images/t2.jpg" alt="">
                                <div class="b-wrapper">
                                    <h3 class="b-animate b-from-top top-in1   b-delay03 ">
                                        <span>CLARISSA</span>
                                    </h3>
                                </div>
                            </a>
                        </div>

                        <div class="col-md2">

                            <div class="col-md-6 men1">
                                <a href="{{ route('item', ['id' => 1, 'nome' => 'Item']) }}"
                                   class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive"
                                                                                     src="/images/t3.jpg" alt="">
                                    <div class="b-wrapper">
                                        <h3 class="b-animate b-from-top top-in2   b-delay03 ">
                                            <span>COLORMATE</span>
                                        </h3>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6 men2">
                                <a href="{{ route('item', ['id' => 1, 'nome' => 'Item']) }}"
                                   class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive"
                                                                                     src="/images/t4.jpg" alt="">
                                    <div class="b-wrapper">
                                        <h3 class="b-animate b-from-top top-in2   b-delay03 ">
                                            <span>HERLEQUIN</span>
                                        </h3>
                                    </div>
                                </a>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="content-top">
                    <h1>NOVOS PRODUTOS</h1>
                    <div class="grid-in">
                        @foreach($produtosNovos as $produto)
                            <div class="col-md-3 grid-top simpleCart_shelfItem">
                                <a href="{{ route('item', ['id' => $produto->id, 'nome' => $produto->nome]) }}"
                                   class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive"
                                                                                     src="/images/pi.jpg" alt="">
                                    <div class="b-wrapper">
                                        <h3 class="b-animate b-from-left b-delay03 ">
                                            <span>{{ $produto->nome }}</span>
                                        </h3>
                                    </div>
                                </a>
                                <p>
                                    <a href="{{ route('item', ['id' => $produto->id, 'nome' => $produto->nome]) }}">{{ $produto->nome }}</a>
                                </p>
                                <a href="#" class="item_add">
                                    <p class="number item_price"><i> </i>R$ {{ $produto->valor }}</p>
                                </a>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!----->
        </div>
        <!---->
    </div>
@endsection