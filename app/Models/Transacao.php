<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    /** @use HasFactory<\Database\Factories\TransacaoFactory> */
    protected $table = 'transacoes';
    use HasFactory;
    protected $fillable = [
        'id_usuario',
        'id_categoria',
        'tipo',
        'valor'
    ];
}
