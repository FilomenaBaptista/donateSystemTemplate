<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DoacaoFisica extends Model
{
    use HasFactory;

    protected $table = 'doacao_bens_materiais';
    protected $fillable = ['imagem', 'anuncio', 'categoria', 'qtd_itens_doar', 'local', 'estado_artigo', 'descricao', 'is_anonimo', 'user_id'];

    public function criador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function listDoacaoFisica(
        int $criadorId = null,
        int $eliminado = null,
        string $search = null
    ) {
        try {
            $with['comentarios'] = 'comentarios';
            $query =  DoacaoFisica::from('doacao_bens_materiais as dbm')
                ->with('criador')
                ->orderBy('dbm.id', 'DESC');


            if ($with['comentarios'] !== 'comentarios') {
                $query->with('comentarios');
            }
            if ($criadorId !== null) {
                $query->where('dbm.user_id', '=', $criadorId);
            }
            if (!is_null($eliminado)) {
                $query->where('dbm.eliminado', '=', $criadorId);
            }
            if (!empty($search)) {
                $query->where('dbm.anuncio', 'like', "%" . $search . "%");
            }
            return $query->paginate(6)->withQueryString();
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
    public function getDoacaoFisica(
        int $doacaoFisicaId
    ) {
        try {
            return DoacaoFisica::from('doacao_bens_materiais as dbm')
                ->with('criador')
                // ->with('comentarios')
                ->where('dbm.id', $doacaoFisicaId)
                ->first(['dbm.*']);
        } catch (Exception $e) {
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
    public function createDoacaoFisica(
        int $doacoaoId,
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
            $doacaoFisica->user_id = $doacoaoId;
            $doacaoFisica->imagem = $imagem;
            $doacaoFisica->anuncio = $anuncio;
            $doacaoFisica->categoria_id = $categoriaId;
            $doacaoFisica->qtd_itens_doar = $qtdItensDoar;
            $doacaoFisica->local = $local;
            $doacaoFisica->estado_artigo = $estadoArtigo;
            $doacaoFisica->descricao = $descricao;
            $doacaoFisica->is_anonimo = $isAnonimo;
            $doacaoFisica->save();
            return  $doacaoFisica;
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
    public function updateDoacaoFisica(
        int $doacaoFisicaId,
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
            $doacaoFisica = DoacaoFisica::find($doacaoFisicaId);
            $doacaoFisica->update([
                'imagem' => $imagem,
                'anuncio' => $anuncio,
                'categoria_id' => $qtdItensDoar,
                'qtd_itens_doar' => $categoriaId,
                'local' => $local,
                'estado_artigo' => $estadoArtigo,
                'descricao' => $descricao,
                'is_anonimo' => $isAnonimo,
            ]);
            return $doacaoFisica;
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
    public function deleteDoacaoFisica(int $doacaoFisicaId)
    {
        try {
            $doacaoFisica = DoacaoFisica::findOrFail($doacaoFisicaId);
            $doacaoFisica->eliminado = '1';
            $doacaoFisica->update();
            return $doacaoFisica;
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e->getCode());
        }
    }
    public function campanhasRecentes(
        int $limit,
        int $excepto_id = null
    ) {
        try {
            
            $query = DoacaoFisica::latest()->take($limit);
            if(!is_null($excepto_id)){
                $query->where('id', '!=', $excepto_id);
            }
            return  $query->get();
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e->getCode());
        }
    }
}
