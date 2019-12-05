<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'Empleado';
    protected $primaryKey = 'Id';
    protected $fillable = ['Nombre','Apellido', 'Documento'];

    public $timestamps = false;
}