<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
use App\Produto;
use App\Vitrine;
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
            Cache::put('categorias', array_chunk(Categoria::all()->toArray(), 3), 1);
            Cache::put('marcas', Marca::all()->toArray(), 1);
        }

        $produtos = Produto::where('ativo', 1)->take(4)->get()->sortByDesc('id');

        $vitrineItens = Vitrine::where('ativo', 1)->take(4);
        $principal = $vitrineItens->first();
        $item2 = $vitrineItens->take(2)->get()->last();
        $item3 = $vitrineItens->take(3)->get()->last();
        $item4 = $vitrineItens->take(4)->get()->last();

        return view('index')
            ->with('produtosNovos', $produtos)
            ->with('principal', $principal)
            ->with('item2', $item2)
            ->with('item3', $item3)
            ->with('item4', $item4);
    }
}
