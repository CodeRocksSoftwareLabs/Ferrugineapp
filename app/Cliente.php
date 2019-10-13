<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';

    protected $fillable = [
        'ds_nome',
        'ds_email',
        'ds_telefone',
        'ds_telefone2',
        'ds_cep',
        'ds_endereco',
        'ds_numero',
        'ds_complemento',
        'ds_bairro',
        'ds_cidade',
        'ds_obs',
        'usuario_id',
        'estado_id'
    ];

    public function agendamentos()
    {
        return $this->hasMany('App\Agendamento');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function getCreatedAtAttribute($value) {
        return $value != 0 ? date('d/m/Y H:i', strtotime($value)) : null;
    }

    public function getUpdatedAtAttribute($value) {
        return $value != 0 ? date('d/m/Y H:i', strtotime($value)) : null;
    }
}
