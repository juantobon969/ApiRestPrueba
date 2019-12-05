<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'Turno';
    protected $primaryKey = 'Id';
    protected $fillable = ['HoraInicio','HoraFin', 'DiaId'];

    public $timestamps = false;

    public function Dia()
    {
    	return $this->hasOne(Dia::class, 'Id', 'DiaId');
    } 
}