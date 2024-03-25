<?php

namespace Database\Seeders;

use App\Models\Regra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regras = [
            [
                'regra' => '123456789',
                'nome_da_variavel' => 'senha_padrao',
                'tipo' => 'TEXTO',
                'descricao' => 'Senha Padrão para os utilizadores criados pela primeira vez.',
                'user_id' => '1'
            ],
            [
                'regra' => '2005-12-31',
                'nome_da_variavel' => 'data_nascimento_max',
                'tipo' => 'DATA',
                'descricao' => 'Data Máxima de Nascimento',
                'user_id' => '1'
            ],
            [
                'regra' => 'doacao@2024',
                'nome_da_variavel' => 'secreto',
                'tipo' => 'TEXTO',
                'descricao' => 'Código secreto para...',
                'user_id' => '1'
            ],
            [
                'regra' => '5',
                'nome_da_variavel' => 'qtd_maxima_doacao',
                'tipo' => 'NUMERO',
                'descricao' => 'Quantidade maxima de doação',
                'user_id' => '1'
            ],

        ]; //fim das regras padrão

        //cria cada regra contida no vector regras
        foreach ($regras as $regra)
            Regra::Create($regra);
    }
}
