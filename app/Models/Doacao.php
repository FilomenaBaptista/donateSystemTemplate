<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Exception;

class Doacao extends Model
{
    use HasFactory;

    public function listDoacao(
        int $episodeId = null
    ) {
         try {
            return Doacao::join('users AS u', 'u.user_id', '=', 'doacao.beneficiario_id')
            ->orderBy('Doacao_id', 'DESC')
            ->get([
                'doacao.*', 
                'u.name AS user_name',
            ]);
        } catch (QueryException $e) {
            throw new Exception($e->getCode());
        }
    }

    /**
     * Get 
     * 
     * @return Collection Related data in get
     * @throws Exception This exception will be thrown if there is a problem executing the database query,
     * returning the fault code
     */
    public function getDoacao(
        int $DoacaoId
    ) {
        try {
            return Doacao::join('users AS u', 'u.user_id', '=', 'doacao.beneficiario_id')
            ->where('doacao_id', $DoacaoId) 
            ->first([
                'doacao.*', 
                'u.name AS user_name'
            ]);
        } catch (QueryException $e) {
            throw new Exception($e->getCode());
        }
    }
    
    /** 
     * Create 
     * 
     * @return New Collection data created
     * @throws Exception This exception will be thrown if there is a problem executing the database query,
     * returning the fault code
     */
    public function createDoacao(
        int $doadorId,
        int $beneficiarioId,
        string $quantia = null,
        string $descricao = null
    ) {
        try {
            $Doacao = new Doacao();
            $Doacao->doador_id = $doadorId;
            $Doacao->beneficiario_id = $beneficiarioId;
            $Doacao->quantia = $quantia;
            $Doacao->descricao = $descricao;
            $Doacao->estado = "Pendente";
            $Doacao->save();
            
            return $Doacao;
        } catch (QueryException $e) {
            throw new Exception($e->getCode());
        }
    }

    /** 
     * Update 
     * 
     * @return New Collection data updated
     * @throws Exception This exception will be thrown if there is a problem executing the database query,
     * returning the fault code
     */
    public function updateDoacao(
        int $DoacaoId,
        string $estado = null
    ) {
        try {
            $Doacao = Doacao::find($DoacaoId);
            $Doacao->update([
                'estado' => $estado,
            ]);

            return $Doacao;
        } catch (QueryException $e) {
            throw new Exception($e->getCode());
        }
    }

    /**
    * Delete 
    *
    * @return Collection data deleted
    * @throws Exception This exception will be thrown if there is a problem executing the database query,
    * returning the fault code
    */
    public function deleteDoacao(int $DoacaoId)
    {
        try {
            $Doacao = Doacao::find($DoacaoId);
            $Doacao->eliminado = 1;
            $Doacao->update();
            return $Doacao;
        } catch (QueryException $e) {
            throw new Exception($e->getCode());
        }
    }
}
