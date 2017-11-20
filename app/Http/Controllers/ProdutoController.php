<?php

namespace App\Http\Controllers;

use Request;
use App\Produto;

class ProdutoController extends Controller
{
    public function lista()
    {
        $produtos = Produto::all();
        return view('produtos/list')->with('produtos', $produtos);
    }

    public function item($id, $nome)
    {
        $produto = Produto::find($id);
        return view('produtos/item')->with('produto', $produto);
    }
}