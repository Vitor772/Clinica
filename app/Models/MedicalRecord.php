<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'data',
        'medical_history',
        'initial_demand',
        'treatment_goals',
        'evolution',
        'general_info',
    ];

    // Relacionamento com o paciente
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
