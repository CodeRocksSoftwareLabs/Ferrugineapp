<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agendamento extends Model
{
    use SoftDeletes;

    protected $table = 'agendamentos';

    protected $fillable = [
        'dt_agendamento',
        'hr_agendamento',
        'hr_duracao',
        'ds_agendamento',
        'cliente_id',
        'usuario_id',
        'status_id'
    ];

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

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
