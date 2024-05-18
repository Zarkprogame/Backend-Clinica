<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PatientModel;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $pacientes = PatientModel::all();
        return json_encode(['pacientes' => $pacientes]);
    }

    public function store(Request $request)
    {
        $paciente = new PatientModel();
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->sexo = $request->sexo;
        $paciente->telefono = $request->telefono;
        $paciente->direccion = $request->direccion;
        $paciente->email = $request->email;
        $paciente->save();

        return json_encode(['paciente' => $paciente]);
    }

    public function show(string $id)
    {
        $paciente = PatientModel::find($id);

        return json_encode(['paciente' => $paciente]);
    }

    public function update(Request $request, string $id)
    {
        $paciente = PatientModel::find($id);

        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->sexo = $request->sexo;
        $paciente->telefono = $request->telefono;
        $paciente->direccion = $request->direccion;
        $paciente->email = $request->email;
        $paciente->save();

        return json_encode(['paciente' => $paciente]);
    }

    public function destroy(string $id)
    {
        $paciente = PatientModel::find($id);
        $paciente->delete();

        return json_encode(['success' => true]);
    }
}
