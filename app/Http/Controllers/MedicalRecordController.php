<?php
namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    /**
     * Exibe a lista de prontuários médicos.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
{
    $query = MedicalRecord::with('patient');

    if ($request->has('patient_name') && $request->patient_name != '') {
        $query->whereHas('patient', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->patient_name . '%');
        });
    }

    if ($request->has('age') && $request->age != '') {
        $query->whereHas('patient', function ($q) use ($request) {
            $q->where('age', $request->age);
        });
    }

    if ($request->has('data') && $request->data != '') {
        $query->where('data', $request->data);
    }

    $medicalRecords = $query->get();

    $patients = Patient::all();

    return view('medical_records.index', compact('medicalRecords', 'patients'))
        ->with('filters', $request->all());
}
    /**
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);

        $patient = $medicalRecord->patient;

        // Retorna a view com os dados
        return view('medical_records.show', compact('medicalRecord', 'patient'));
    }

    /**
     * Exibe o formulário para criar um novo prontuário médico.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Busca todos os pacientes para exibir na dropdown
        $patients = Patient::all();

        // Retorna a view com os dados
        return view('medical_records.create', compact('patients'));
    }

    /**
     * Armazena um novo prontuário médico no banco de dados.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validação dos dados
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

    /**
     * Exibe o formulário para editar um prontuário médico existente.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Busca o prontuário pelo ID
        $medicalRecord = MedicalRecord::findOrFail($id);

        // Busca todos os pacientes para exibir na dropdown
        $patients = Patient::all();

        // Retorna a view com os dados
        return view('medical_records.edit', compact('medicalRecord', 'patients'));
    }

    /**
     * Atualiza um prontuário médico existente no banco de dados.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'data' => 'required|date',
            'medical_history' => 'nullable|string',
            'initial_demand' => 'nullable|string',
            'treatment_goals' => 'nullable|string',
            'evolution' => 'nullable|string',
            'general_info' => 'nullable|string',
        ]);

        // Busca o prontuário pelo ID
        $medicalRecord = MedicalRecord::findOrFail($id);

        // Atualiza o prontuário
        $medicalRecord->update([
            'patient_id' => $request->patient_id,
            'data' => $request->data,
            'medical_history' => $request->medical_history,
            'initial_demand' => $request->initial_demand,
            'treatment_goals' => $request->treatment_goals,
            'evolution' => $request->evolution,
            'general_info' => $request->general_info,
        ]);

        // Redirecionar com sucesso
        return redirect()->route('medical_records.index')->with('success', 'Prontuário atualizado com sucesso!');
    }

    /**
     * Remove um prontuário médico do banco de dados.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Busca o prontuário pelo ID
        $medicalRecord = MedicalRecord::findOrFail($id);

        // Exclui o prontuário
        $medicalRecord->delete();

        // Redirecionar com sucesso
        return redirect()->route('medical_records.index')->with('success', 'Prontuário excluído com sucesso!');
    }
}
