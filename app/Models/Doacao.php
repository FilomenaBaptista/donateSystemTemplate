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
    protected $table = 'doacoes';
    protected $fillable = [
        'doador_id',
        'campanha_id',
        'valor_monetario',
        'comprovativo_path',
        'tipo_doacao',
        'flexRadioDefault'
    ];

    public function listDoacao(
        int $doadorId = null,
        int $campanhaId = null,
        int $eliminado = null,
        string $status = null
    ) {
         try {
         
            $query =  Doacao::from('doacoes as d')
            ->orderBy('d.id', 'DESC');
          
            if ($doadorId !== null) {
                $query->where('d.doador_id', '=', $doadorId);
            }
            if ($campanhaId !== null) {
                $query->where('d.campanha_id', '=', $campanhaId);
            }
            if (!is_null($eliminado)) {
                $query->where('d.eliminado', '=', $eliminado);
            }else{
                $query->where('d.eliminado', '=', '0');
            }
           
            if (!empty($estado)) {
                $query->where('d.status', $estado);
            }

            return $query->paginate(10)->withQueryString();
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
        int $campanhaId,
        float $valorMonetario,
        string $comprovativoPath = null,
        string $flexRadioDefault = null,
        string $descricao = null
    ) {
        try {
            $Doacao = new Doacao();
            $Doacao->doador_id = $doadorId;
            $Doacao->campanha_id = $campanhaId;
            $Doacao->valor_monetario = $valorMonetario;
            $Doacao->comprovativo_path = $comprovativoPath;
            $Doacao->flexRadioDefault = $flexRadioDefault;
            $Doacao->descricao = $descricao;
            $Doacao->tipo_doacao = 'Campanha';
            $Doacao->save();
            return $Doacao;
        } catch (Exception $e) {
          
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
                'status' => $estado,
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
