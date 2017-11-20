<?php

namespace App\Http\Controllers;


use App\Produto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Request;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = Session::get('cart');
        $valorTotal = 0;
        $itens = [];

        if (!empty($carrinho)) {
            $carrinho->map(function ($item) use (&$itens, &$valorTotal) {
                $valorTotal += $item['valor'];
                return $itens[] = $item;
            });
        }

        return view('carrinho/index')
            ->with('carrinho', $itens)
            ->with('quantidade', count($itens))
            ->with('total', $valorTotal);
    }

    public function checkout()
    {
        return view('carrinho/checkout');
    }

    public function adicionar(Request $request)
    {
        $cart = (null === Session::get('cart')) ? Collection::make([]) : Session::get('cart');
        $produto = Produto::find(Request::input('produto_id'));
        $quantidade = (null === Request::get('quantidade')) ? 1 : Request::get('quantidade');

        if ($cart->has($produto->id)) {
            $item = $cart->pull($produto->id);
            $item['quantidade'] += $quantidade;
            $cart->put($produto->id, $item);
        } else {

            $cart->put($produto->id, [
                'id' => $produto->id,
                'quantidade' => 1,
                'valor' => $produto->valor,
                'image' => $produto->imagens->first()['link'],
                'name' => $produto->nome,
            ]);
        }

        var_dump($cart);

        Session::put('cart', $cart);
        return redirect()->back()->with('notificationText', 'Product Added to Cart Successfully!');
    }

    public function view()
    {
        $cartProducts = Session::get('cart');

        return view('cart.view')
            ->with('cartProducts', $cartProducts);
    }

    public function destroy()
    {
        Session::flush();
        return redirect()->back();
    }

    public function remover()
    {
        Session::forget(Request::input('item'));
        return redirect()->back();
    }
}