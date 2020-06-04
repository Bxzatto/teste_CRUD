<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fisica extends Model
{

    protected $fillable = ['id_Empresa','rg','data_nasc'];

    protected $table = 'fisica' ;

    public function tipoEmpresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id_Empresa', 'id');
    }

}