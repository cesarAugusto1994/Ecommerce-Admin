<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Request;

class UsuariosController extends Controller
{
    public function conta($id)
    {
        $usuario =  Usuarios::find($id);
        return view('usuarios/editar')->with('usuario', $usuario);
    }

    public function salvarEdicao()
    {
        $usuario = Usuarios::find(Request::input('id'));

        $usuario->name = Request::input('nome');
        $usuario->email = Request::input('email');
        $usuario->save();

        return redirect()->route('conta', ['id' => $usuario->id]);
    }
}
