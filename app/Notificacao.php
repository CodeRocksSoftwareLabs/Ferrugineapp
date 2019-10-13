<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificacao extends Model
{
    use SoftDeletes;

    protected $table = 'notificacoes';

    protected $fillable = [
        'ds_notificacao',
        'fl_lido',
        'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function getCreatedAtAttribute($value) {
        return $value != 0 ? date('d/m/Y H:i', strtotime($value)) : null;
    }

    public function getUpdatedAtAttribute($value) {
        return $value != 0 ? date('d/m/Y H:i', strtotime($value)) : null;
    }
}
