<?php

namespace App\Services;

use App\Helpers\PathHelper;
use App\Helpers\StatusHelper;
use Exception;
use Yajra\DataTables\DataTables;
use App\Models\Doacao;

/**
 * Class DoacaoService
 * @package App\Services
 */
class DoacaoService
{
    /**
     * List 
     * 
     * @return array Collection data found
     * @exception Log error and return array with error code and message
     */
    public function listDoacao(
        int $episodeId = null
    ) {
        try {
            $doacao = new Doacao();
              $response = DataTables::of($doacao->listDoacao(
                $episodeId
            ))->make(true);  
            
            return StatusHelper::response(['data' => $response, 'tag' => 'LIST.DOAÇÃO', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'LIST.DOAÇÃO', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Get
     * 
     * @return array Collection data
     * @exception Log error and return array with error code and message
     */
    public function getDoacao(
        int $DoacaoId
    ) {
        try {
            $Doacao = new Doacao();
            $response = $Doacao->getDoacao(
                $DoacaoId
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'GET.DOAÇÃO', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'GET.DOAÇÃO', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }
    
    /**
     * Create
     * 
     * @return array Collection data created
     * @exception Log error and return array with error code and message
     */
    public function createDoacao(       
        int $doadorId,
        int $beneficiarioId,
        string $quantia = null,
        string $descricao = null
    ) {
        try {
            $Doacao = new Doacao();
            $response = $Doacao->createDoacao(
                $doadorId,
                $beneficiarioId,
                $quantia,
                $descricao,
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'CREATE.DOAÇÃO', 'status' => 201]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'CREATE.DOAÇÃO', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Update 
     * 
     * @return array Collection data updated
     * @exception Log error and return array with error code and message
     */
    public function updateDoacao(
        int $DoacaoId,  
        int $beneficiarioId,
        string $estado
    ) {
        try {
            $Doacao = new Doacao();
            $response = $Doacao->updateDoacao(
                $DoacaoId,
                $beneficiarioId,
                (is_null($estado) ? 'Não Aceite' : $estado)
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'UPDATE.DOAÇÃO', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'UPDATE.DOAÇÃO', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Delete 
     * 
     * @return array With success deleted or not
     * @exception Log error and return array with error code and message
     */
    public function deleteDoacao(
        int $DoacaoId
    ) {
        try {
            $Doacao = new Doacao();
            $response = $Doacao->deleteDoacao( $DoacaoId);
            return StatusHelper::response(['data' => $response, 'tag' => 'DELETE.DOAÇÃO', 'status' => 204]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'DELETE.DOAÇÃO', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    

}