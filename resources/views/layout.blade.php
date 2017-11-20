<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>E-Commerce - @yield('title')</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Mattress Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <!-- start menu -->
    <link href="/css/memenu.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="/js/memenu.js"></script>
    <script>
        $(document).ready(function () {
            $(".memenu").memenu();
            $(".item_add").click(function () {
                $.ajax({
                    method: "POST",
                    url: "/carrinho/adicionar",
                    data: {
                        produto_id: $(this).data('produto'),
                        quantidade: $(this).data('quantidade'),
                        _token: $(this).data('token')
                    }
                });
            });

            $(".simpleCart_empty").click(function () {
                $.ajax({
                    method: "POST",
                    url: "/carrinho/destroy",
                    data: {
                        _token: $(this).data('token')
                    }
                });

                window.location.reload();
            });
        });
    </script>
    <script src="/js/simpleCart.min.js">

    </script>
</head>

<body>
<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="social">
                <ul>
                    <li><a href="#"><i class="facebok"> </i></a></li>
                    <li><a href="#"><i class="twiter"> </i></a></li>
                    <li><a href="#"><i class="inst"> </i></a></li>
                    <li><a href="#"><i class="goog"> </i></a></li>
                    <div class="clearfix"></div>
                </ul>
            </div>
            <div class="header-left">

                <div class="search-box">
                    <div id="sb-search" class="sb-search">
                        <form action="#" method="post">
                            <input class="sb-search-input" placeholder="Enter your search term..." type="search"
                                   id="search">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"> </span>
                        </form>
                    </div>
                </div>

                <!-- search-scripts -->
                <script src="/js/classie.js"></script>
                <script src="/js/uisearch.js"></script>
                <script>
                    new UISearch(document.getElementById('sb-search'));
                </script>
                <!-- //search-scripts -->

                <div class="ca-r">
                    <div class="cart box_1">
                        <a href="{{ route('carrinho') }}">
                            <h3>
                                <div class="total">
                                    <span class="simpleCart_total"></span></div>
                                <img src="/images/cart.png" alt=""/></h3>
                        </a>
                        <p><a href="javascript:;" data-token="{{ csrf_token() }}" class="simpleCart_empty">Empty
                                Cart</a></p>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="head-top">
            <div class="logo">
                <h1><a href="/">E-Commerce</a></h1>
            </div>
            <div class=" h_menu4">
                <ul class="memenu skyblue">
                    <li><a class="color1" href="{{ route('produtos') }}">Produtos</a></li>
                    <li><a class="color1" href="#">Categorias</a>
                        <div class="mepanel">
                            <div class="row">
                                @foreach(\Illuminate\Support\Facades\Cache::get('categorias') as $categoria)
                                    <div class="col1">
                                        <div class="h_nav">
                                            <ul>
                                                <li><a href="#">{{ $categoria['nome'] }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="grid"><a class="color2" href="#">Marcas</a>
                        <div class="mepanel">
                            <div class="row">
                                @foreach(\Illuminate\Support\Facades\Cache::get('marcas') as $marca)
                                    <div class="col1">
                                        <div class="h_nav">
                                            <ul>
                                                <li><a href="#">{{ $marca['nome'] }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>

                    @if(auth()->guest())
                        @if(!Request::is('/login'))
                            <li><a class="color4" href="{{ url('/login') }}">Login</a></li>
                        @endif
                    @else
                        <li><a href="#">Olá {{ auth()->user()->name }}</a>

                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1">
                                        <div class="h_nav">
                                            <ul>
                                                <li><a href="{{ route('conta', ['id' => auth()->user()->id]) }}">Meus
                                                        dados</a></li>
                                                <li><a href="products.html">Meus Pedidos</a></li>
                                                <li><a class="btn btn-link btn-sm bottom-left"
                                                       href="{{ route('logout') }}">Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>
                    @endif
                    <li><a class="color6" href="{{ route('contato') }}">Contato</a></li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

@yield('content')

<div class="footer w3layouts">
    <div class="container">
        <div class="footer-top-at w3">

            <div class="col-md-3 amet-sed w3l">
                <h4>MAIS INFORMACOES</h4>
                <ul class="nav-bottom">
                    <li><a href="#">Como Comprar</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="{{ route('contato') }}">Endereco</a></li>
                    <li><a href="#">Sua Conta</a></li>
                </ul>
            </div>
            <div class="col-md-3 amet-sed w3ls">
                <h4>CATEGORIAS</h4>
                <ul class="nav-bottom">
                    @foreach(\Illuminate\Support\Facades\Cache::get('categorias') as $categoria)
                        <li><a href="#">{{ isset($categoria['nome']) ? $categoria['nome'] : '' }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 amet-sed agileits">
                <h4>NEWSLETTER</h4>
                <div class="stay agileinfo">
                    <div class="stay-left wthree">
                        <form action="#" method="post">
                            <input type="text" placeholder="Enter your email " required="">
                        </form>
                    </div>
                    <div class="btn-1 w3-agileits">
                        <form action="#" method="post">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-3 amet-sed agileits-w3layouts">
                <h4>CONTATE-NOS</h4>
                <p>R. Padre Anchieta, 985, Alphaviller</p>
                <p>Pinheiros/ES - Brasil</p>
                <p>Escritorio : +55 27 99988 1234</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer-class w3-agile">
        <p>© 2015 E-Commerce . Todos os direitos sao Reservados</p>
    </div>
</div>
</body>

</html>