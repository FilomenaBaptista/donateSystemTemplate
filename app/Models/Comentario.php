<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class Comentario extends Model
{
    use HasFactory;
    protected $fillable = ['conteudo'];

    /**
     * Get
     *
     * @return Collection Related data in get
     * @throws Exception This exception will be thrown if there is a problem executing the database query,
     * returning the fault code
     */
    public function getComentario(
        int $comentarioId
    ) {
        try {
            return Comentario::from('comentarios as c')
            ->where('c.id', $comentarioId)
            ->first(['c.*']);
        } catch (QueryException $e) {
            throw new Exception($e->getCode());
        }
    }

    public function createComentario(
        int $userId,
        int $campanhaId,
        string $conteudo
    ) {
        try {
            $comentario = new Comentario();
            $comentario->user_id = $userId;
            $comentario->campanha_id = $campanhaId;
            $comentario->conteudo = $conteudo;
            $comentario->save();
            return $comentario;
        } catch (QueryException $e) {
            throw new Exception($e->getCode());
        }
    }

    public function updateComentario(
        int $comentarioId,
        string $conteudo
    ) {
        try {
            $comentario = Comentario::findOrFail($comentarioId);
            $comentario->update([
                'conteudo' => $conteudo
            ]);
            return $comentario;
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e->getCode());
        }
    }

    public function deleteComentario(int $comentarioId)
    {
        try {
            $comentario = comentario::findOrFail($comentarioId);
            $comentario->eliminado = '1';
            $comentario->update();
            return $comentario;
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e->getCode());
        }
    }
}
