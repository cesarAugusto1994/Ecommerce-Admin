<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoProduto;
use App\Produto;
use Illuminate\Support\Facades\Session;
use Request;

class PedidoController extends Controller
{
    public function vendaFinalizada()
    {
        return view('carrinho/finalizar');
    }

    public function salvar()
    {
        $pedido = new Pedido();
        $pedido->usuario_id = auth()->user()->id;
        $pedido->valor = Session::get('cart')->sum('valor');;
        $pedido->save();

        Session::get('cart')->map(function ($item) use ($pedido) {

            $pedidoProduto = new PedidoProduto();
            $pedidoProduto->produto_id = $item['id'];
            $pedidoProduto->pedido_id = $pedido->id;
            $pedidoProduto->save();

            $produto = Produto::find($item['id']);
            $produto->quantidade -= 1;
            $produto->save();
        });

        Session::flush();

        return redirect()->action('PedidoController@vendaFinalizada');
    }
}
