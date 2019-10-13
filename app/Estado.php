<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $fillable = [
        'ds_sigla',
        'ds_estado'
    ];

    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }
}
