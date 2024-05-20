<?php

namespace App\Http\Controllers\api;

use App\Models\MedicalRecordModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = DB::table('medical_records')
            ->join('patients', 'medical_records.paciente_id', '=', 'patients.id')
            ->select('medical_records.*', 'patients.nombre')
            ->get();
        return json_encode(['records' => $records]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $record = new MedicalRecordModel();
        $record->id = $request->id;
        $record->paciente_id = $request->paciente_id;
        $record->fecha = $request->fecha;
        $record->descripcion = $request->descripcion;
        $record->save();
        return json_encode(['$record' => $record]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = MedicalRecordModel::find($id);
        $patients = DB::table('patients')
            ->orderBy('nombre')
            ->get();
        return json_encode(['record' => $record, 'patients' => $patients]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = MedicalRecordModel::find($id);
        $record->id = $request->id;
        $record->paciente_id = $request->paciente_id;
        $record->fecha = $request->fecha;
        $record->descripcion = $request->descripcion;
        $record->save();
        return json_encode(['$record' => $record]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = MedicalRecordModel::find($id);
        $record->delete();

        $records = DB::table('medical_records')
            ->join('patients', 'medical_records.paciente_id', '=', 'patients.id')
            ->select('medical_records.*', 'patients.nombre')
            ->get();

        return json_encode(['records' => $records, 'success' => true]);
    }
}
