<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{

    protected $fillable = ['id_Contato','telefone'];

    protected $table = 'telefones' ;

    public function contato()
    {
        return $this->belongsTo('App\Models\Contato', 'id','id_Contato');
    }

}