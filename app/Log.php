<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use SoftDeletes;

    protected $table = 'logs';

    protected $fillable = [
        'ds_log',
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
