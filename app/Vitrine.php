<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vitrine
 * @package App
 */
class Vitrine extends Model
{
    protected $table = 'produtos_vitrine';

    protected $fillable = ['produto_id'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
