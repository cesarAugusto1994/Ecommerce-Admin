<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
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
            Cache::put('categorias', Categoria::all()->toArray(), 1200);
            Cache::put('marcas', Marca::all()->toArray(), 1200);
        }

        return view('index');
    }
}
