<?php

namespace App\Http\Controllers;

use App\Categoria;
use Request;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function salvar()
    {
        Categoria::create(Request::all());
        return redirect()->action('CategoriasController@index');
    }

    public function index()
    {
        $categorias =  Categoria::all();
        return view('categorias/lista')->with('categorias', $categorias);
    }

    public function editar($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias/editar')->with('categoria', $categoria);
    }

    public function salvarEdicao()
    {
        $categoria = Categoria::find(Request::input('id'));

        $categoria->nome = Request::input('nome');
        $categoria->save();

        return redirect()->action('CategoriasController@index');
    }
}
