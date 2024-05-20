<?php

namespace App\Http\Controllers\api;

use App\Models\MedicalAppointmentModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = DB::table('medical_appointments')
            ->join('patients', 'medical_appointments.paciente_id', '=', 'patients.id')
            ->select('medical_appointments.*', 'patients.nombre')
            ->get();
        return json_encode(['appointments' => $appointments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $appointment = new MedicalAppointmentModel();
        $appointment->id = $request->id;
        $appointment->paciente_id = $request->paciente_id;
        $appointment->fecha_hora = $request->fecha_hora;
        $appointment->tipo = $request->tipo;
        $appointment->estado = $request->estado;
        $appointment->save();
        return json_encode(['$appointment' => $appointment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = MedicalAppointmentModel::find($id);
        $patients = DB::table('patients')
            ->orderBy('nombre')
            ->get();
        return json_encode(['appointment' => $appointment, 'patients' => $patients]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $appointment = MedicalAppointmentModel::find($id);
        $appointment->id = $request->id;
        $appointment->paciente_id = $request->paciente_id;
        $appointment->fecha_hora = $request->fecha_hora;
        $appointment->tipo = $request->tipo;
        $appointment->estado = $request->estado;
        $appointment->save();

        return json_encode(['$appointment' => $appointment]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = MedicalAppointmentModel::find($id);
        $appointment->delete();

        $appointments = DB::table('medical_appointments')
            ->join('patients', 'medical_appointments.paciente_id', '=', 'patients.id')
            ->select('medical_appointments.*', 'patients.nombre')
            ->get();

        return json_encode(['appointments' => $appointments, 'success' => true]);
    }
}
