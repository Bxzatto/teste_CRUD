<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juridica extends Model
{
    protected $fillable = ['id_Empresa','nome_fantasia'];

    protected $table = 'juridica' ;
    
    public function tipoEmpresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id_Empresa', 'id');
    }

}