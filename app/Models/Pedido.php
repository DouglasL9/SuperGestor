<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // public function produtos()
    // {
    //     return $this->belongsToMany(Produto::class);
    // }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class)->withPivot('id', 'created_at', 'updated_at', 'quantidade');
    }
}
