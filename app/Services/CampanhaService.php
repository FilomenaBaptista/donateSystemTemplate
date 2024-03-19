<?php

namespace App\Services;

use App\Helpers\PathHelper;
use App\Helpers\StatusHelper;
use Exception;
use Yajra\DataTables\DataTables;
use App\Models\Campanha;

/**
 * Class CampanhaService
 * @package App\Services
 */
class CampanhaService
{
    /**
     * List
     *
     * @return array Collection data found
     * @exception Log error and return array with error code and message
     */
    public function listCampanha(
        int $criadorId = null,
        int $eliminado = null
    ) {
        try {
            $campanha = new Campanha();
               $response = $campanha->listCampanha(
                $criadorId,
                $eliminado
            ); 
              /*  $response = DataTables::of($campanha->listCampanha(
                $criadorId,
                $eliminado
            ))->make(true);  */

            return StatusHelper::response(['data' => $response, 'tag' => 'LIST.CAMPANHA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'LIST.CAMPANHA', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Get
     *
     * @return array Collection data
     * @exception Log error and return array with error code and message
     */
    public function getCampanha(
        int $campanhaId
    ) {
        try {
            $campanha = new Campanha();
            $response = $campanha->getcampanha(
                $campanhaId
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'GET.CAMPANHA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'GET.CAMPANHA', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Create
     *
     * @return array Collection data created
     * @exception Log error and return array with error code and message
     */
    public function createCampanha(
        int $criadorId,
        string $titulo,
        string $descricao,
        int $categoriaId,
        string $capa
    ) {
        try {
            $campanha = new Campanha();
            $response = $campanha->createCampanha(
                $criadorId,
                $titulo,
                $descricao,
                $categoriaId,
                $capa
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'CREATE.CAMPANHA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'CREATE.CAMPANHA', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Update
     *
     * @return array Collection data updated
     * @exception Log error and return array with error code and message
     */
    public function updateCampanha(
        int $campanhaId,
        string $titulo,
        string $descricao,
        int $categoriaId,
        string $capa
    ) {
        try {
            $campanha = new Campanha();
            $response = $campanha->updateCampanha(
                $campanhaId,
                $titulo,
                $descricao,
                $categoriaId,
                $capa
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'UPDATE.CAMPANHA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'UPDATE.CAMPANHA', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Delete
     *
     * @return array With success deleted or not
     * @exception Log error and return array with error code and message
     */
    public function deleteCampanha(
        int $campanhaId
    ) {
        try {
            $campanha = new Campanha();
            $response = $campanha->deleteCampanha( $campanhaId);
            return StatusHelper::response(['data' => $response, 'tag' => 'DELETE.CAMPANHA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'DELETE.CAMPANHA', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    public function  campanhasRecentes(
        int $limit
    ) {
        try {
            $campanha = new Campanha();
            $response = $campanha->campanhasRecentes($limit);
            return StatusHelper::response(['data' => $response, 'tag' => 'LIST.CAMPANHA RECENTE', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'LIST.CAMPANHA RECENTE', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }



}
