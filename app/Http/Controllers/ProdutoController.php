<?php

namespace App\Http\Controllers;

use Request;
use App\Produto;
use App\Marca;

class ProdutoController extends Controller
{
    public function lista()
    {
        if (Request::has('marca')) {

            $search = Request::get('marca');
            $marca = Marca::find($search);

            if (!empty($marca)) {
                $produtos = $marca->produtos();
            } else {
                $produtos = Produto::all();
            }


        } else if (Request::has('search')) {
            $search = Request::get('search');
            $produtos = Produto::where('nome', 'like', '%' .$search. '%')->orWhere('id', $search)->get();
        } else {
            $produtos = Produto::all();
        }

        return view('produtos/list')->with('produtos', $produtos);
    }

    public function item($id, $nome)
    {
        $produto = Produto::find($id);

        $sugestoes = Produto::where('ativo', 1)->Take(3)->get();

        return view('produtos/item')
            ->with('produto', $produto)
            ->with('sugestoes', $sugestoes);
    }
}