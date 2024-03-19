<?php

namespace App\Services;

use App\Helpers\PathHelper;
use App\Helpers\StatusHelper;
use Exception;
use Yajra\DataTables\DataTables;
use App\Models\Categoria;

/**
 * Class CategoriaService
 * @package App\Services
 */
class CategoriaService
{
    /**
     * List
     *
     * @return array Collection data found
     * @exception Log error and return array with error code and message
     */
    public function listCategoria(
        string $name = null
    ) {
        try {
            $categoria = new Categoria();
            $response = $categoria->listCategoria(
                $name
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'LIST.CATEGORIA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'LIST.CATEGORIA', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Get
     *
     * @return array Collection data
     * @exception Log error and return array with error code and message
     */
    public function getCategoria(
        int $categoriaId
    ) {
        try {
            $categoria = new Categoria();
            $response = $categoria->getcategoria(
                $categoriaId
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'GET.CATEGORIA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'GET.CATEGORIA', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Create
     *
     * @return array Collection data created
     * @exception Log error and return array with error code and message
     */
    public function createCategoria(
        string $name
    ) {
        try {
            $categoria = new categoria();
            $response = $categoria->createCategoria(
                $name
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'CREATE.CATEGORIA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'CREATE.CATEGORIA', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Update
     *
     * @return array Collection data updated
     * @exception Log error and return array with error code and message
     */
    public function updateCategoria(
        int $categoriaId,
        string $name
    ) {
        try {
            $categoria = new categoria();
            $response = $categoria->updateCategoria(
                $categoriaId,
                $name
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'UPDATE.CATEGORIA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'UPDATE.CATEGORIA', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Delete
     *
     * @return array With success deleted or not
     * @exception Log error and return array with error code and message
     */
    public function deleteCategoria(
        int $categoriaId
    ) {
        try {
            $categoria = new categoria();
            $response = $categoria->deleteCategoria( $categoriaId);
            return StatusHelper::response(['data' => $response, 'tag' => 'DELETE.CATEGORIA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'DELETE.CATEGORIA', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }
}
