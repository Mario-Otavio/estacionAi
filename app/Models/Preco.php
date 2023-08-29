<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    use HasFactory;


    protected $table = 'preco'; // Nome da tabela no banco de dados

    protected $fillable = [
        'categoria',
        'valor_por_hora'
    ];
}
