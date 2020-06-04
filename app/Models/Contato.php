<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{

    protected $fillable = ['nome','id_Empresa'];

    protected $table = 'contato' ;

    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa', 'id_Empresa', 'id');
    }

    public function telefones()
    {
        return $this->hasMany('App\Models\Telefone', 'id_Contato', 'id');
    }
}