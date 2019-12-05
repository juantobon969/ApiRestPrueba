<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $table = 'Dia';
    protected $primaryKey = 'Id';
    protected $fillable = ['Nombre'];

    public $timestamps = false;
}
