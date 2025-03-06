<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        // Filtragem dos pacientes
        $query = Patient::query();

        if ($request->has('data') && $request->data) {
            $query->whereDate('created_at', '=', $request->data);
        }

        if ($request->has('name') && $request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('age') && $request->age) {
            $query->where('age', '=', $request->age);
        }

        if ($request->has('civil_status') && $request->civil_status) {
            $query->where('civil_status', 'like', '%' . $request->civil_status . '%');
        }

        if ($request->has('id_gov') && $request->id_gov) {
            $query->where('id_gov', 'like', '%' . $request->id_gov . '%');
        }

        if ($request->has('responsable') && $request->responsable) {
            $query->where('responsable', 'like', '%' . $request->responsable . '%');
        }

        // Obtém os pacientes filtrados
        $patients = $query->get();

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $patient = Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Paciente criado com sucesso!');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Paciente atualizado com sucesso!');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Paciente excluído com sucesso!');
    }
}
