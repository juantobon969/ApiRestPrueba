<?php

namespace App\Http\Controllers;

use App\Model\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
     //GET ALL EMPLEADOS
     public function Get()
     {
        return Empleado::all();
     }
 
     //GET EMPLEADO BY ID
     public function GetById($id)
     {
        return Empleado::find($id);
     }

     //GET EMPLEADO BY DOCUMENTO
     public function GetByDoc($documento)
     {
        $empleados = Empleado::where('Documento', '=', $documento)->get();
        if($empleados->isEmpty()) return null;

        return $empleados[0];
     }

     //POST EMPLEADO
    public function Post(Request $request)
    {
        if($this->GetByDoc($request->Documento) != null)
            return response()->json(['Error' => 'El empleado con documento ' . $request->Documento . ' ya existe']);
        return Empleado::create($request->all());
    }
 
     //PUT EMPLEADO
     public function Put($id, Request $request)
     {
        $empleado = $this->GetById($id);
        if($empleado == null) 
            return response()->json(['Error' => 'No existe el empleado']);
        $empleado->fill($request->all())->save();
        return $empleado;
     }
 
     //DELETE EMPLEADO
     public function Delete($id)
     {
        $empleado = $this->GetById($id);
        $empleado->delete();
        return $empleado;
     }
}