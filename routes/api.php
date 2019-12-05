<?php

use Illuminate\Http\Request;

#region Dia
Route::get('Dia', 'DiaController@Get')->name('Get');
Route::get('Dia/{id}', 'DiaController@GetById')->name('GetById');
Route::post('Dia', 'DiaController@Post')->name('Post');
Route::put('Dia/{id}', 'DiaController@Put')->name('Put');
Route::delete('Dia/{id}', 'DiaController@Delete')->name('Delete');
#endregion

#region Turno
Route::get('Turno', 'TurnoController@Get')->name('Get');
Route::get('Turno/{id}', 'TurnoController@GetById')->name('GetById');
Route::get('Turno/{op}/{value}', 'TurnoController@GetByOp')->name('GetByOp');
Route::post('Turno', 'TurnoController@Post')->name('Post');
Route::put('Turno/{id}', 'TurnoController@Put')->name('Put');
Route::delete('Turno/{id}', 'TurnoController@Delete')->name('Delete');
#endregion

#region Empleado_has_Turno
Route::get('Empleado_has_Turno', 'Empleado_has_TurnoController@Get')->name('Get');
Route::get('Empleado_has_Turno/{documento}', 'Empleado_has_TurnoController@GetByDocumento')->name('GetByDocumento');
Route::post('Empleado_has_Turno', 'Empleado_has_TurnoController@Post')->name('Post');
Route::put('Empleado_has_Turno/{id}', 'Empleado_has_TurnoController@Put')->name('Put');
Route::delete('Empleado_has_Turno/{id}', 'Empleado_has_TurnoController@Delete')->name('Delete');
#endregion

#region Empleado
Route::get('Empleado', 'EmpleadoController@Get')->name('Get');
Route::get('Empleado/{id}', 'EmpleadoController@GetById')->name('GetById');
Route::post('Empleado', 'EmpleadoController@Post')->name('Post');
Route::put('Empleado/{id}', 'EmpleadoController@Put')->name('Put');
Route::delete('Empleado/{id}', 'EmpleadoController@Delete')->name('Delete');
#endregion