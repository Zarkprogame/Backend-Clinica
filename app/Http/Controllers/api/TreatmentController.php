<?php

namespace App\Http\Controllers\api;

use App\Models\TreatmentModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treatments = DB::table('treatments')
            ->join('medical_records', 'treatments.historial_id', '=', 'medical_records.id')
            ->select('treatments.*', 'medical_records.descripcion')
            ->get();
        return json_encode(['treatments' => $treatments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $treatment = new TreatmentModel();
        $treatment->id = $request->id;
        $treatment->historial_id = $request->historial_id;
        $treatment->descripcion = $request->descripcion;
        $treatment->costo = $request->costo;
        $treatment->save();
        return json_encode(['$treatment' => $treatment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $treatment = TreatmentModel::find($id);
        $records = DB::table('medical_records')
            ->orderBy('nombre')
            ->get();
        return json_encode(['treatment' => $treatment, 'records' => $records]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $treatment = TreatmentModel::find($id);
        $treatment->id = $request->id;
        $treatment->historial_id = $request->historial_id;
        $treatment->descripcion = $request->descripcion;
        $treatment->costo = $request->costo;
        $treatment->save();
        return json_encode(['$treatment' => $treatment]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $treatment = TreatmentModel::find($id);
        $treatment->delete();

        $treatments = DB::table('treatments')
            ->join('medical_records', 'treatments.historial_id', '=', 'medical_records.id')
            ->select('treatments.*', 'medical_records.descripcion')
            ->get();

        return json_encode(['treatments' => $treatments, 'success' => true]);
    }
}
