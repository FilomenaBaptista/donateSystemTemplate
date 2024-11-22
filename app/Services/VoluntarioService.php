<?php

namespace App\Services;

use App\Helpers\PathHelper;
use App\Helpers\StatusHelper;
use Exception;
use Yajra\DataTables\DataTables;
use App\Models\Voluntario;

/**
 * Class VoluntarioService
 * @package App\Services
 */
class VoluntarioService
{
    /**
     * List
     *
     * @return array Collection data found
     * @exception Log error and return array with error code and message
     */
    public function listVoluntario(
        int $criadorId = null,
        string $search = null,
        string $endereço = null,
        string $sobre = null,
        int $isTrabalhador = null
    ) {
        try {
            $voluntario = new Voluntario();
         
            $response = $voluntario->listVoluntario(
                $criadorId,
                $search,
                $endereço,
                $sobre,
                $isTrabalhador
            );
       
            return StatusHelper::response(['data' => $response, 'tag' => 'LIST.VOLUNTARIO', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'LIST.VOLUNTARIO', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Get
     *
     * @return array Collection data
     * @exception Log error and return array with error code and message
     */
    public function getVoluntario(
        int $voluntarioId
    ) {
        try {
            $voluntario = new Voluntario();
            $response = $voluntario->getVoluntario(
                $voluntarioId
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'GET.VOLUNTARIO', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'GET.VOLUNTARIO', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Create
     *
     * @return array Collection data created
     * @exception Log error and return array with error code and message
     */
    public function createVoluntario(){}
    
    

    /**
     * Update
     *
     * @return array Collection data updated
     * @exception Log error and return array with error code and message
     */
    public function updateVoluntario(
        int $voluntarioId,
        string $dataNascimento,
        string $endereco,
        int $isTrabalhador,
        string $profissao,
        string $descricao
    ) {
        try {
            $voluntario = new Voluntario();
            $response = $voluntario->updateVoluntario(
                $voluntarioId,
                $dataNascimento,
                $endereco,
                $isTrabalhador,
                $profissao,
                $descricao
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'UPDATE.VOLUNTARIO', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'UPDATE.VOLUNTARIO', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Delete
     *
     * @return array With success deleted or not
     * @exception Log error and return array with error code and message
     */
    public function deleteVoluntario(
        int $voluntarioId
    ) {
        try {
            $voluntario = new Voluntario();
            $response = $voluntario->deleteVoluntario($voluntarioId);
            return StatusHelper::response(['data' => $response, 'tag' => 'DELETE.VOLUNTARIO', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'DELETE.VOLUNTARIO', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }
}
