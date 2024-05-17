<?php

namespace App\Services;

use App\Helpers\PathHelper;
use App\Helpers\StatusHelper;
use Exception;
use Yajra\DataTables\DataTables;
use App\Models\DoacaoFisica;

/**
 * Class DoacaoFisicaFisicaService
 * @package App\Services
 */
class DoacaoFisicaService
{
    /**
     * List
     *
     * @return array Collection data found
     * @exception Log error and return array with error code and message
     */
    public function listDoacaoFisica(
        int $doacoaoId = null,
        int $eliminado = null
    ) {
        try {
            $DoacaoFisica = new DoacaoFisica();
               $response = $DoacaoFisica->listDoacaoFisica(
                $doacoaoId,
                $eliminado
            ); 
              /*  $response = DataTables::of($DoacaoFisica->listDoacaoFisica(
                $criadorId,
                $eliminado
            ))->make(true);  */

            return StatusHelper::response(['data' => $response, 'tag' => 'LIST.DOACAOFISICA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'LIST.DOACAOFISICA', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Get
     *
     * @return array Collection data
     * @exception Log error and return array with error code and message
     */
    public function getDoacaoFisica(
        int $doacaoFisicaId
    ) {
        try {
            $doacaoFisica = new DoacaoFisica();
            $response = $doacaoFisica->getDoacaoFisica(
                $doacaoFisicaId
            );

            return StatusHelper::response(['data' => $response, 'tag' => 'GET.DOACAOFISICA', 'status' => 200]);
        } catch (Exception $e) {
           
            return StatusHelper::response(['tag' => 'GET.DOACAOFISICA', 'status' => (int) $e->getMessage(), 'line_trace' => __LINE__, 'class_trace' => PathHelper::getClassName($this)]);
        }
    }

    /**
     * Create
     *
     * @return array Collection data created
     * @exception Log error and return array with error code and message
     */
    public function createDoacaoFisica(
        int $doadorId,
        string $imagem,
        string $anuncio,
        int $categoriaId,
        int $qtdItensDoar,
        string $local,
        string $estadoArtigo,
        string $descricao,
        int $isAnonimo
    ) {
        try {
            $doacaoFisica = new DoacaoFisica();
            $response = $doacaoFisica->createDoacaoFisica(
                $doadorId,
                $imagem,
                $anuncio,
                $categoriaId,
                $qtdItensDoar,
                $local,
                $estadoArtigo,
                $descricao,
                $isAnonimo
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'CREATE.DOACAOFISICA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'CREATE.DOACAOFISICA', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Update
     *
     * @return array Collection data updated
     * @exception Log error and return array with error code and message
     */
    public function updateDoacaoFisica(
        int $DoacaoFisicaId,
        string $imagem,
        string $anuncio,
        int $categoriaId,
        int $qtdItensDoar,
        string $local,
        string $estadoArtigo,
        string $descricao,
        int $isAnonimo
    ) {
        try {
            $DoacaoFisica = new DoacaoFisica();
            $response = $DoacaoFisica->updateDoacaoFisica(
                $DoacaoFisicaId,
                $imagem,
                $anuncio,
                $categoriaId,
                $qtdItensDoar,
                $local,
                $estadoArtigo,
                $descricao,
                $isAnonimo
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'UPDATE.DOACAOFISICA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'UPDATE.DOACAOFISICA', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    /**
     * Delete
     *
     * @return array With success deleted or not
     * @exception Log error and return array with error code and message
     */
    public function deleteDoacaoFisica(
        int $DoacaoFisicaId
    ) {
        try {
            $DoacaoFisica = new DoacaoFisica();
            $response = $DoacaoFisica->deleteDoacaoFisica( $DoacaoFisicaId);
            return StatusHelper::response(['data' => $response, 'tag' => 'DELETE.DOACAOFISICA', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'DELETE.DOACAOFISICA', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }

    public function  DoacaoFisicaRecentes(
        int $limit,
        int $excepto_id = null
    ) {
        try {
            $DoacaoFisica = new DoacaoFisica();
            $response = $DoacaoFisica->DoacaoFisicasRecentes(
                $limit,
                $excepto_id
            );
            return StatusHelper::response(['data' => $response, 'tag' => 'LIST.DOACAOFISICA RECENTE', 'status' => 200]);
        } catch (Exception $e) {
            return StatusHelper::response(['tag' => 'LIST.DOACAOFISICA RECENTE', 'status' => (int) $e->getMessage(),  'line_trace' => __LINE__,'class_trace' => PathHelper::getClassName($this) ]);
        }
    }



}
