<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos()
    {
        return $this->hasMany(PedidoProduto::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class);
    }
}
