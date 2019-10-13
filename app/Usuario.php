<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;

    protected $table = 'usuarios';

    protected $fillable = [
        'ds_nome',
        'ds_email',
        'ds_telefone',
        'ds_login',
        'ds_senha',
        'ds_foto',
        'ds_loja',
    ];

    protected $hidden = [
        'ds_senha',
        'token',
        'fl_admin'
    ];

    public function agendamentos()
    {
        return $this->hasMany('App\Agendamento');
    }

    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }

    public function logs()
    {
        return $this->hasMany('App\Log');
    }

    public function notificacao()
    {
        return $this->hasMany('App\Notificacao');
    }

    public function getCreatedAtAttribute($value) {
        return $value != 0 ? date('d/m/Y H:i', strtotime($value)) : null;
    }

    public function getUpdatedAtAttribute($value) {
        return $value != 0 ? date('d/m/Y H:i', strtotime($value)) : null;
    }
}
