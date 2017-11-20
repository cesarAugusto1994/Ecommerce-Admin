<?php

namespace App\Http\Controllers;

class VendaController
{
    public function index()
    {
        return view('carrinho/index');
    }

    public function checkout()
    {
        return view('carrinho/checkout');
    }
}