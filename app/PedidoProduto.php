<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
