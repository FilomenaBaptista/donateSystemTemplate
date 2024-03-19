<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function comentarios()
    {return $this->hasMany(Categoria::class);}

    public function listCategoria(
        string $name = null
    ) {
         try {

            $query =  Categoria::from('Categorias as c')
            ->orderBy('c.name', 'ASC');

            if ($name !== null) {
                $query->where('c.name', '=', $name);
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
