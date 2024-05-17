<?php

namespace App\Services;

use App\Helpers\PathHelper;
use App\Helpers\StatusHelper;
use Exception;
use Yajra\DataTables\DataTables;
use App\Models\Comentario;

/**
 * Class comentarioService
 * @package App\Services
 */
class ComentarioService
{

    /**
     * Get
     *
     * @return array Collection data
     * @exception Log error and return array with error code and message
     */
    public function getComentario(
        int $comentarioId
    ) {
        try {
            $comentario = new Comentario();
            $response = $comentario->getcomentario(
                $comentarioId
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'GET.COMENTARIO', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'GET.COMENTARIO', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Create
     *
     * @return array Collection data created
     * @exception Log error and return array with error code and message
     */
    public function createComentario(
        int $userId,
        int $id,
        string $tipo,
        string $conteudo
    ) {
        try {
            $comentario = new Comentario();
            $response = $comentario->createComentario(
                $userId,
                $id,
                $tipo,
                $conteudo
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'CREATE.COMENTARIO', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'CREATE.COMENTARIO', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Update
     *
     * @return array Collection data updated
     * @exception Log error and return array with error code and message
     */
    public function updateComentario(
        int $comentarioId,
        string $conteudo
    ) {
        try {
            $comentario = new Comentario();
            $response = $comentario->updateComentario(
                $comentarioId,
                $conteudo
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'UPDATE.COMENTARIO', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'UPDATE.COMENTARIO', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Delete
     *
     * @return array With success deleted or not
     * @exception Log error and return array with error code and message
     */
    public function deleteComentario(
        int $comentarioId
    ) {
        try {
            $comentario = new Comentario();
            $response = $comentario->deleteComentario( $comentarioId);
            return StatusHelper::response(['data' => $response, 'tag' => 'DELETE.COMENTARIO', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'DELETE.COMENTARIO', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

}
