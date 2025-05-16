<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtodetalhe extends Model
{
    use HasFactory;
    protected $fillable = [
        'altura',
        'comprimento',
        'largura',
        'produto_id',
        'unidade_id',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}
