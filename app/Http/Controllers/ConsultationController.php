<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\Patient;

class ConsultationController extends Controller
{
    // Exibir todas as consultas
    public function index()
    {
        $consultations = Consultation::all();
        return view('consults.index', compact('consultations'));
    }

    // Exibir o formulário para criar uma nova consulta
    public function create()
    {
        $patients = Patient::all(); // Pega todos os pacientes para escolher
        return view('consults.create', compact('patients'));
    }

    // Armazenar uma nova consulta
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id', // Verificar se o paciente existe
            'consultation_date' => 'required|date',
            'description' => 'required|string',
        ]);

        Consultation::create($validated);

        return redirect()->route('consults.index')->with('success', 'Consulta criada com sucesso!');
    }

    // Exibir os detalhes de uma consulta
    public function show(Consultation $consultation)
    {
        return view('consults.show', compact('consultation'));
    }

    // Exibir o formulário para editar uma consulta existente
    public function edit(Consultation $consultation)
    {
        $patients = Patient::all(); // Pega todos os pacientes para editar
        return view('consults.edit', compact('consultation', 'patients'));
    }

    // Atualizar a consulta no banco de dados
    public function update(Request $request, Consultation $consultation)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'consultation_date' => 'required|date',
            'description' => 'required|string',
        ]);

        $consultation->update($validated);

        return redirect()->route('consults.index')->with('success', 'Consulta atualizada com sucesso!');
    }

    // Excluir uma consulta
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();

        return redirect()->route('consults.index')->with('success', 'Consulta excluída com sucesso!');
    }
}
