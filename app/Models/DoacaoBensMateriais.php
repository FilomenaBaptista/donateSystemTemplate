<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DoacaoBensMateriais extends Model
{
    use HasFactory;

    protected $fillable = ['capa','anuncio','categoria','qtd_itens_doar','local','estado_artigo','descricao','is_anonimo','user_id'];

    public function doarBensMateriais(): BelongsTo
    {return $this->belongsTo(User::class,'user_id');}

    public function comentarios()
    {return $this->hasMany(Comentario::class);}

    public function listDoacaoBensMateriais(
        int $doacoaoId = null,
        int $eliminado = null
    ) {
         try {
            $with['comentarios'] = 'comentarios';
            $query =  DoacaoBensMateriais::from('doacao_bens_materiais as dbm')
            ->with('criador')
            ->orderBy('dbm.id', 'DESC');

            if ($doacoaoId !== null) {
                $query->where('dbm.user_id', '=', $doacoaoId);
            }
            if (!is_null($eliminado)) {
                $query->where('dbm.eliminado', '=', $doacoaoId);
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
    public function getDoacaoBensMateriais(
        int $doacaoBensMateriaisId
    ) {
        try {
            return DoacaoBensMateriais::from('doacao_bens_materiais as dbm')
            ->with('criador')
            ->with('comentarios')
            ->where('dbm.id', $doacaoBensMateriaisId)
            ->first(['dbm.*']);
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
    public function createDoacaoBensMateriais(
        int $doacoaoId,
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
            $doacaoBensMateriais = new DoacaoBensMateriais();
            $doacaoBensMateriais->user_id = $doacoaoId;
            $doacaoBensMateriais->capa = $capa;
            $doacaoBensMateriais->anuncio = $anuncio;
            $doacaoBensMateriais->categoria_id = $categoriaId;
            $doacaoBensMateriais->qtd_itens_doar = $qtdItensDoar;
            $doacaoBensMateriais->local = $local;
            $doacaoBensMateriais->estado_artigo = $estadoArtigo;
            $doacaoBensMateriais->descricao = $descricao;
            $doacaoBensMateriais->is_anonimo = $isAnonimo;
            $doacaoBensMateriais->save();
            return  $doacaoBensMateriais;
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
            $doacaoBensMateriais = DoacaoBensMateriais::find($doacaoBensMateriaisId);
            $doacaoBensMateriais->update([
                'capa' => $capa,
                'anuncio' => $anuncio,
                'categoria_id' => $qtdItensDoar,
                'qtd_itens_doar' => $categoriaId,
                'local' => $local,
                'estado_artigo' => $estadoArtigo,
                'descricao' => $descricao,
                'is_anonimo' => $isAnonimo,
            ]);
            return $doacaoBensMateriais;
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
    public function deleteDoacaoBensMateriais(int $doacaoBensMateriaisId)
    {
        try {
            $doacaoBensMateriais = DoacaoBensMateriais::findOrFail($doacaoBensMateriaisId);
            $doacaoBensMateriais->eliminado = '1';
            $doacaoBensMateriais->update();
            return $doacaoBensMateriais;
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
