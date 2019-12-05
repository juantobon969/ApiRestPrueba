<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Empleado_has_Turno extends Model
{
    protected $table = 'Empleado_has_Turno';
    protected $primaryKey = 'Id';
    protected $fillable = ['EmpleadoId','TurnoId', 'TurnoDiaId'];

    public $timestamps = false;

    public function Empleado()
    {
    	return $this->hasOne(Empleado::class, 'Id', 'EmpleadoId');
    } 

    public function Turno()
    {
    	return $this->hasOne(Turno::class, 'Id', 'TurnoId');
    } 

    public function Dia()
    {
    	return $this->hasOne(Dia::class, 'Id', 'TurnoDiaId');
    } 
}