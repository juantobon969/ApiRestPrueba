<?php

namespace App\Http\Controllers;

use App\Model\Dia;
use Illuminate\Http\Request;

class DiaController extends Controller
{
     //GET ALL
     public function Get()
     {
         return Dia::all();
     }
 
     //GET BY ID
     public function GetById($id)
     {
         return Dia::find($id);
     }
 
     //POST
     public function Post(Request $request)
     {
         return Dia::create($request->all());
     }
 
     //PUT
     public function Put($id, Request $request)
     {
         $Dia = $this->GetById($id);
         $Dia->fill($request->all())->save();
         return $Dia;
     }
 
     //DELETE
     public function Delete($id)
     {
         $Dia = $this->GetById($id);
         $Dia->delete();
         return $Dia;
     }
}
