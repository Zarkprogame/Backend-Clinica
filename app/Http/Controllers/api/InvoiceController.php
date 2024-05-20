<?php

namespace App\Http\Controllers\api;

use App\Models\InvoiceModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = DB::table('invoices')
            ->join('patients', 'invoices.paciente_id', '=', 'patients.id')
            ->select('invoices.*', 'patients.nombre')
            ->get();
        return json_encode(['invoices' => $invoices]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $invoice = new InvoiceModel();
        $invoice->id = $request->id;
        $invoice->paciente_id = $request->paciente_id;
        $invoice->fecha_emision = $request->fecha_emision;
        $invoice->total = $request->total;
        $invoice->estado = $request->estado;
        $invoice->save();
        return json_encode(['$invoice' => $invoice]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = InvoiceModel::find($id);
        $patients = DB::table('patients')
            ->orderBy('nombre')
            ->get();
        return json_encode(['invoice' => $invoice, 'patients' => $patients]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoice = InvoiceModel::find($id);
        $invoice->id = $request->id;
        $invoice->paciente_id = $request->paciente_id;
        $invoice->fecha_emision = $request->fecha_emision;
        $invoice->total = $request->total;
        $invoice->estado = $request->estado;
        $invoice->save();
        return json_encode(['$invoice' => $invoice]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = InvoiceModel::find($id);
        $invoice->delete();

        $invoices = DB::table('invoices')
            ->join('patients', 'invoices.paciente_id', '=', 'patients.id')
            ->select('invoices.*', 'patients.nombre')
            ->get();

        return json_encode(['invoices' => $invoices, 'success' => true]);
    }
}
