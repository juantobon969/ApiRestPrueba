<?php

namespace App\Http\Controllers;

use App\Model\Empleado;
use App\Model\Dia;
use App\Model\Turno;
use App\Model\Empleado_has_Turno;
use Illuminate\Http\Request;

class Empleado_has_TurnoController extends Controller
{
     //GET ALL
     public function Get()
     {
         return Empleado_has_Turno::with(['Empleado', 'Turno', 'Dia'])->get();
     }
 
     //GET BY ID
     private function GetById($id)
     {
         return Empleado_has_Turno::with(['Empleado', 'Turno', 'Dia'])->find($id);
     }
 
     //GET BY ID
     public function GetByDocumento($documento)
     {
         return Empleado_has_Turno::with(['Empleado', 'Turno', 'Dia'])->whereHas('Empleado', function ($query) use ($documento) {
            $query->where('Empleado.Documento', '=', $documento);
        })->get();
     }

    //GET BY ID
    public function GetByIdEmpleado($id)
    {
        return Empleado::find($id);
    }

    //GET BY ID
    public function GetByIdTurno($id)
    {
        return Turno::find($id);
    }
 
     //GET BY ID
    public function GetByIdDia($id)
    {
        return Dia::find($id);
    }
 
     //POST
     public function Post(Request $request)
     {
        if($this->GetByIdEmpleado($request->EmpleadoId) == null)
            return response()->json(['Error' => 'No existe el empleado']);

        $resTurno = $this->GetByIdTurno($request->TurnoId);
        if($resTurno == null)
             return response()->json(['Error' => 'No existe el turno']); 
        $request['TurnoDiaId'] = $resTurno['DiaId'];

        if($this->GetByIdDia($request->TurnoDiaId) == null)
             return response()->json(['Error' => 'No existe el dia']);
        return Empleado_has_Turno::create($request->all());
     }
 
     //PUT
     public function Put($id, Request $request)
     {
         $Empleado_has_Turno = $this->GetById($id);
        //  if($Turno_has_Dia == null)
        //      return response()->json(['Error' => 'No existe el registro']);
        //  if($this->GetByIdTurno($request->TurnoId) == null)
        //      return response()->json(['Error' => 'No existe el turno']);
        //  if($this->GetByIdDia($request->DiaId) == null)
        //      return response()->json(['Error' => 'No existe el dia']);
 
         $Empleado_has_Turno->fill($request->all())->save();
         return $Empleado_has_Turno;
     }
 
     //DELETE
     public function Delete($id)
     {
         $Empleado_has_Turno = $this->GetById($id);
         $Empleado_has_Turno->delete();
         return $Empleado_has_Turno;
     }
}
