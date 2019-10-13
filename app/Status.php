<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = [
        'ds_status'
    ];

    public function agendamentos()
    {
        return $this->hasMany('App\Agendamento');
    }
}
