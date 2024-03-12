<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model
{
    use HasFactory;
    protected $fillable = [
        'data_nascimento',
        'endereço',
        'is_trabalhador',
        'profissao',
        'area_de_interesse',
        'sobre',
        'user_id'
    ];
}
