<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'veiculo_id', // Adicione a coluna 'veiculo_id' ao array $fillable
        'forma_pagamento',
        'valor',
    ];
}
