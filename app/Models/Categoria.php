<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function campanhas(){
        return $this->hasMany(Campanha::class,'categoria_id','id');}

    public function listCategoria(
        string $name = null
    ) {
         try {

            $query = Categoria::orderBy('categorias.name', 'ASC')
            ->withCount('campanhas');
             if ($name !== null) {
                $query->where('categorias.name', '=', $name);
            }
            return $query->get(); 
        } catch (Exception $e) {
            throw new Exception($e->getCode());
        }
    }

    public function getNames($dados){
        $nomes = array();
        foreach ($dados as $dado) {
            $nomes[$dado->id] = strtoupper($dado->name);
        }

        return $nomes;
    }
}
