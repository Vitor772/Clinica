<?php
namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index()
    {
        // Busca todos os pacientes para exibir na dropdown
        $patients = Patient::all();
        return view('medical_records.create', compact('patients'));
    }

    public function show($id)
{
    // Recupera o prontuário pelo ID
    $medicalRecord = MedicalRecord::findOrFail($id);

    // Recupera o paciente relacionado ao prontuário
    $patient = $medicalRecord->patient;  // Supondo que você tenha um relacionamento no modelo MedicalRecord

    // Retorna a view com os dados
    return view('medical_records.show', compact('medicalRecord', 'patient'));
}


    public function create()
    {
        // Busca todos os pacientes para exibir na dropdown
        $patients = Patient::all();
        return view('medical_records.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'data' => 'required|date',
            'medical_history' => 'nullable|string',
            'initial_demand' => 'nullable|string',
            'treatment_goals' => 'nullable|string',
            'evolution' => 'nullable|string',
            'general_info' => 'nullable|string',
        ]);

        // Criar o prontuário
        MedicalRecord::create([
            'patient_id' => $request->patient_id,
            'data' => $request->data,
            'medical_history' => $request->medical_history,
            'initial_demand' => $request->initial_demand,
            'treatment_goals' => $request->treatment_goals,
            'evolution' => $request->evolution,
            'general_info' => $request->general_info,
        ]);

        // Redirecionar com sucesso
        return redirect()->route('medical_records.index')->with('success', 'Prontuário criado com sucesso!');
    }

}
