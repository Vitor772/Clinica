<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Patient;

class ConsultationController extends Controller
{
    public function index()
{
    $patients = Patient::all();
    $consultations = Consultation::with('patient')->get();
    return view('consults.index', compact('patients', 'consultations'));
}

    public function create()
    {
        $patients = Patient::all();
        $consultations = Consultation::with('patient')->get();
        return view('consults.create', compact('patients', 'consultations'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'patient_id' => 'required|exists:patients,id',
        'consultation_date' => 'required|date',
        'description' => 'required|string',
    ]);

    $consultation = Consultation::create($validated);

    return response()->json([
        'success' => true,
        'message' => 'Consulta criada com sucesso!',
        'data' => $consultation
    ]);
}

    public function show(Consultation $consultation)
    {
        return view('consults.show', compact('consultation'));
    }

    public function edit(Consultation $consultation)
    {
        $patients = Patient::all();
        return view('consults.edit', compact('consultation', 'patients'));
    }

    public function update(Request $request, Consultation $consultation)
    {
        $validated = $request->validate([
            'description' => 'required|string',
        ]);

        $consultation->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Consulta criada com sucesso!',
            'data' => $consultation
        ]);
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();

        return redirect()->route('consults.index')->with('success', 'Consulta excluída com sucesso!');
    }
}
