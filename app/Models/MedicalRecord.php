<?php

// app/Models/MedicalRecord.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MedicalRecord extends Model
{
    protected $fillable = [
        'patient_id', 'date', 'medical_history', 'initial_demand', 'treatment_goals',
        'evolution', 'general_info'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class); // Relacionamento com o paciente
    }
}

