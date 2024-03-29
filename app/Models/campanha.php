<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Campanha extends Model
{
    use HasFactory;

    protected $fillable = ['titulo','descricao','categoria'];

    public function criador(): BelongsTo
    {return $this->belongsTo(User::class,'user_id');}

    public function comentarios()
    {return $this->hasMany(Comentario::class);}

    public function listcampanha(
        int $criadorId = null,
        int $eliminado = null
    ) {
         try {
            $with['comentarios'] = 'comentarios';
            $query =  Campanha::from('campanhas as c')
            ->with('criador')
            ->orderBy('c.id', 'DESC');

            if ($with['comentarios'] !== 'comentarios') {
                $query->with('comentarios');
            }
            if ($criadorId !== null) {
                $query->where('c.user_id', '=', $criadorId);
            }
            if (!is_null($eliminado)) {
                $query->where('c.eliminado', '=', $criadorId);
            }

            return $query->paginate(6);
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
    public function getcampanha(
        int $campanhaId
    ) {
        try {
            return Campanha::from('campanhas as c')
            ->with('criador')
            ->with('comentarios')
            ->where('c.id', $campanhaId)
            ->first(['c.*']);
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
    public function createcampanha(
        int $criadorId,
        string $titulo,
        string $descricao,
        int $categoriaId,
        string $capa
    ) {
        try {
            $campanha = new campanha();
            $campanha->user_id = $criadorId;
            $campanha->titulo = $titulo;
            $campanha->descricao = $descricao;
            $campanha->categoria_id = $categoriaId;
            $campanha->capa = $capa;
            $campanha->save();
            return  $campanha;
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
    public function updatecampanha(
        int $campanhaId,
        string $titulo,
        string $descricao,
        int $categoriaId,
        string $capa
    ) {
        try {
            $campanha = Campanha::find($campanhaId);
            $campanha->update([
                'titulo' => $titulo,
                'descricao' => $descricao,
                'categoria_id' => $categoriaId,
                'capa' => $capa
            ]);
            return $campanha;
        } catch (Exception $e) {
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
    public function deletecampanha(int $campanhaId)
    {
        try {
            $campanha = Campanha::findOrFail($campanhaId);
            $campanha->eliminado = '1';
            $campanha->update();
            return $campanha;
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e->getCode());
        }
    }
    public function campanhasRecentes(int $limit)
    {
        try {
            return Campanha::latest()->take($limit)->get();;
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e->getCode());
        }
    }
}
