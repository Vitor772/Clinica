<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'age', 'birth_date','civil_status', 'id_gov', 'responsable', 'family_reason',
        'demand_start_date', 'behavior_environments', 'specialized_treatment',
        'school_start', 'current_school_performance', 'has_close_friends',
         'pregnancy_planned', 'pregnancy_accepted',
        'blood_pressure_issues', 'infectious_disease', 'pregnancy_complications',
        'pregnancy_complications_details', 'medication_use', 'medication_details',
        'prematurity', 'prematurity_details', 'birth_type', 'birth_complications'
    ];

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
