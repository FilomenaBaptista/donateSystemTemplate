<?php

namespace App\Services;

use App\Helpers\PathHelper;
use App\Helpers\StatusHelper;
use Exception;
use Yajra\DataTables\DataTables;
use App\Models\DoacaoBensMateriais;

/**
 * Class DoacaoBensMateriaisService
 * @package App\Services
 */
class DoacaoBensMateriaisService
{
    /**
     * List
     *
     * @return array Collection data found
     * @exception Log error and return array with error code and message
     */
    public function listDoacaoBensMateriais(
        int $doacoaoId = null,
        int $eliminado = null
    ) {
        try {
            $DoacaoBensMateriais = new DoacaoBensMateriais();
               $response = $DoacaoBensMateriais->listDoacaoBensMateriais(
                $doacoaoId,
                $eliminado
            ); 
              /*  $response = DataTables::of($DoacaoBensMateriais->listDoacaoBensMateriais(
                $criadorId,
                $eliminado
            ))->make(true);  */

            return StatusHelper::response(['data' => $response, 'tag' => 'LIST.DoacaoBensMateriais', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'LIST.DoacaoBensMateriais', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Get
     *
     * @return array Collection data
     * @exception Log error and return array with error code and message
     */
    public function getDoacaoBensMateriais(
        int $doacaoBensMateriaisId
    ) {
        try {
            $DoacaoBensMateriais = new DoacaoBensMateriais();
            $response = $DoacaoBensMateriais->getDoacaoBensMateriais(
                $doacaoBensMateriaisId
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'GET.DoacaoBensMateriais', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'GET.DoacaoBensMateriais', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Create
     *
     * @return array Collection data created
     * @exception Log error and return array with error code and message
     */
    public function createDoacaoBensMateriais(
        int $doadorId,
        string $capa,
        string $anuncio,
        int $categoriaId,
        int $qtdItensDoar,
        string $local,
        string $estadoArtigo,
        string $descricao,
        int $isAnonimo
    ) {
        try {
            $DoacaoBensMateriais = new DoacaoBensMateriais();
            $response = $DoacaoBensMateriais->createDoacaoBensMateriais(
                $doadorId,
                $capa,
                $anuncio,
                $categoriaId,
                $qtdItensDoar,
                $local,
                $estadoArtigo,
                $descricao,
                $isAnonimo
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'CREATE.DoacaoBensMateriais', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'CREATE.DoacaoBensMateriais', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Update
     *
     * @return array Collection data updated
     * @exception Log error and return array with error code and message
     */
    public function updateDoacaoBensMateriais(
        int $doacaoBensMateriaisId,
        string $capa,
        string $anuncio,
        int $categoriaId,
        int $qtdItensDoar,
        string $local,
        string $estadoArtigo,
        string $descricao,
        int $isAnonimo
    ) {
        try {
            $DoacaoBensMateriais = new DoacaoBensMateriais();
            $response = $DoacaoBensMateriais->updateDoacaoBensMateriais(
                $doacaoBensMateriaisId,
                $capa,
                $anuncio,
                $categoriaId,
                $qtdItensDoar,
                $local,
                $estadoArtigo,
                $descricao,
                $isAnonimo
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'UPDATE.DoacaoBensMateriais', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'UPDATE.DoacaoBensMateriais', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Delete
     *
     * @return array With success deleted or not
     * @exception Log error and return array with error code and message
     */
    public function deleteDoacaoBensMateriais(
        int $doacaoBensMateriaisId
    ) {
        try {
            $DoacaoBensMateriais = new DoacaoBensMateriais();
            $response = $DoacaoBensMateriais->deleteDoacaoBensMateriais( $doacaoBensMateriaisId);
            return StatusHelper::response(['data' => $response, 'tag' => 'DELETE.DoacaoBensMateriais', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'DELETE.DoacaoBensMateriais', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    public function  DoacaoBensMateriaissRecentes(
        int $limit
    ) {
        try {
            $DoacaoBensMateriais = new DoacaoBensMateriais();
            $response = $DoacaoBensMateriais->DoacaoBensMateriaissRecentes($limit);
            return StatusHelper::response(['data' => $response, 'tag' => 'LIST.DoacaoBensMateriais RECENTE', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'LIST.DoacaoBensMateriais RECENTE', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }



}
