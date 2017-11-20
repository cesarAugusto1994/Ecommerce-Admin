@extends('layout')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">Meus Dados</div>

                    <div class="panel-body">

            <form class="form-horizontal" method="POST" action="{{  route('usuarios_salvar_edicao')  }}">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $usuario->id }}">

                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Nome</label>
                    <div class="col-md-6">
                        <input id="nome" type="text" class="form-control" name="nome" value="{{ $usuario->name }}" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">E-mail</label>
                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control" name="email" value="{{ $usuario->email }}" required autofocus>
                    </div>
                </div>

                <button class="btn btn-success btn-sm">Salvar</button>

            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection