<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Produto
 * @package App
 */
class Produto extends Model
{
    protected $fillable = ['nome'];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function imagens()
    {
        return $this->hasMany(Imagem::class);
    }
}
