<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Livro;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;

class FuncoesUteisController extends Controller
{

    public function getNames($dados)
    {
        $nomes = array();
        foreach ($dados as $dado) {
            $nomes[$dado->id] = ($dado->name);
        }

        return $nomes;
    }
    public function getTipos($dados)
    {
        $tipos = array();
        foreach ($dados as $dado) {
            $tipos[$dado->id] = $dado->tipo;
        }

        return $tipos;
    }

    public function exceptoName($dados, $nome)
    {
        $nomes = array();
        foreach ($dados as $dado) {
            if ($dado->name != $nome)
                $nomes[$dado->id] = $dado->name;
        }

        return $nomes;
    }

    public function getPrimeiroUltimoNome($nome)
    {
        $nome_completo = $this->getPrimeiroNome($nome) . $this->getUltimoNome($nome);
        return $nome_completo;
    }

    public function getPrimeiroNome($nome)
    {
        //retira espaço no início e no fim
        $sem_espaco = trim($nome);
        $primeiro = $sem_espaco;
        //se tiver espaço, é porque tem mais de um nome.
        if (strpos($sem_espaco, ' ')) {
            //retira a String que está no início, antes do primeiro espaço.
            $primeiro = strstr($sem_espaco, ' ', true);
        }

        return $primeiro;
    }

    public function getUltimoNome($nome)
    {
        //retira espaço no início e no fim
        $sem_espaco = trim($nome);
        $ultimo = $sem_espaco;
        //se tiver espaço, é porque tem mais de um nome.
        if (strpos($sem_espaco, ' ')) {
            //retira a String que está no fim, depois do último espaço.
            $ultimo = strrchr($sem_espaco, ' ');
        }

        return $ultimo;
    }

    public static function abreviarNome($nome, $max = 35)
    {
        $nome = trim($nome);
        $tamanho = strlen($nome);
        if ($tamanho > $max) {
            $nomes = explode(" ", $nome);
            $ultimo = array_pop($nomes);
            $nomes = array_reverse($nomes);
            $pri = array_pop($nomes);
            $nomes = array_reverse($nomes);

            $tamanho = strlen($pri) + strlen($ultimo) + 1;
            $nomes_abreviados = "";

            foreach ($nomes as $n) {
                $tm = strlen($n) + $tamanho + 1;
                if (($tm) <= $max) {
                    $nomes_abreviados .= ' ' . $n;
                    $tamanho += strlen($n);
                } else {
                    $nomes_abreviados .= ' ' . substr($n, 0, 1) . '.';
                    $tamanho += 3;
                }
            }

            $nome_abrev = $pri . " " . $nomes_abreviados . " " . $ultimo;
        } else {
            $nome_abrev = $nome;
        }
        return trim($nome_abrev);
    }
}
