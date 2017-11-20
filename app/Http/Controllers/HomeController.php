<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    protected $redirectTo = '/';


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Cache::has('categorias')) {
            Cache::put('categorias', array_chunk(Categoria::all()->toArray(), 3), 1200);
            Cache::put('marcas', Marca::all()->toArray(), 1200);
        }

        $produtos = Produto::where('ativo', 1)->orderBy('created_at', 'desc')->limit(4);

        return view('index')->with('produtosNovos', $produtos);
    }
}
