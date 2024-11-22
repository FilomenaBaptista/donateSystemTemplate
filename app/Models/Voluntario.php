<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class Voluntario extends Model
{
    use HasFactory;
    protected $fillable = [
        'data_nascimento',
        'endereço',
        'is_trabalhador',
        'profissao',
        'area_de_interesse',
        'sobre',
        'user_id'
    ];

    public function criador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function listVoluntario(
        int $criadorId = null,
        string $search = null,
        string $endereço = null,
        string $sobre = null,
        int $isTrabalhador = null
    ) {
        try {

            $query = Voluntario::from('voluntarios as v')
                ->select('v.*', 'u.name as nome_usuario') // Seleciona os campos da tabela voluntarios e o nome do usuário
                ->leftJoin('users as u', 'v.user_id', '=', 'u.id') 
                ->orderBy('v.id', 'DESC');

            if ($criadorId !== null) {
                $query->where('v.user_id', '=', $criadorId);
            }

            if (!empty($endereço)) {
                $query->where('v.endereço', 'like', "%" . $endereço . "%");
            }
            if (!empty($search)) {
                $query->where('v.profissao', 'like', "%" . $search . "%");
            }
            if (!empty($sobre)) {
                $query->where('v.sobre', 'like', "%" . $sobre . "%");
            }
            if (!empty($isTrabalhador)) {
                $query->where('v.is_trabalhador', 'like', "%" . $isTrabalhador . "%");
            }
            

            return $query->paginate(6)->withQueryString();
        } catch (QueryException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getVoluntario(
        int $voluntarioId
    ) {
        try {
            return Voluntario::from('voluntarios as v')
                ->with('criador')
                ->where('v.id', $voluntarioId)
                ->first(['v.*']);
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
    public function updateVoluntario(
        int $voluntarioId,
        string $dataNascimento,
        string $endereco,
        int $isTrabalhador,
        string $profissao,
        string $descricao
    ) {
        try {
            $voluntario = Voluntario::find($voluntarioId);
            $voluntario->update([
                'data_nascimento' => $dataNascimento,
                'endereco' => $endereco,
                'is_trabalhador' => $isTrabalhador,
                'profissao' => $profissao,
                'descricao' => $descricao,
            ]);
            return $voluntario;
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
    public function deleteVoluntario(int $voluntarioId)
    {
        try {
            $voluntario = Voluntario::findOrFail($voluntarioId);
            $voluntario->eliminado = '1';
            $voluntario->update();
            return $voluntario;
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e->getCode());
        }
    }
}
