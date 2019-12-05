<?php

namespace App\Http\Controllers;

use App\Model\Dia;
use App\Model\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    //GET ALL
    public function Get()
    {
        return Turno::with('Dia')->get();
    }

    //GET BY ID
    public function GetById($id)
    {
        return Turno::with('Dia')->find($id);
    }

     //GET BY ID
     private function GetByIdDia($id)
     {
         return Dia::find($id);
     }

    //GET BY OP
    public function GetByOp($op,$value)
    {
        return Turno::with('Dia')->where($op, '=', $value)->get();
    }
    
    //POST
    public function Post(Request $request)
    {
        if($this->GetByIdDia($request->DiaId) == null)
            return response()->json(['Error' => 'No existe el dia']);
        return Turno::create($request->all());
    }

    //PUT
    public function Put($id, Request $request)
    {
        $Turno = $this->GetById($id);
        if($Turno == null)
            return response()->json(['Error' => 'No existe el turno']);

        $Turno->fill($request->all())->save();
        return $Turno;
    }

    //DELETE
    public function Delete($id)
    {
        $Turno = $this->GetById($id);
        $Turno->delete();
        return $Turno;
    }
}