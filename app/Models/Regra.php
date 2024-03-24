<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regra extends Model
{
    use HasFactory;

    protected $fillable = [
        'regra','nome_da_variavel','tipo', 'descricao','user_id'
    ];
}
