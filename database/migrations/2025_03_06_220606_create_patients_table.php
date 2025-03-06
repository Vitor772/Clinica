<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->date('birth_date'); // Data de nascimento
            $table->string('age');
            $table->string('civil_status');
            $table->string('id_gov');
            $table->string('responsable');
            $table->string('family_reason');
            $table->string('demand_start_date')->nullable();
            $table->string('behavior_environments');
            $table->string('specialized_treatment')->nullable();
            $table->string('school_start')->nullable();
            $table->string('current_school_performance');
            $table->string('has_close_friends');

            // Anamnese - Gravidez
            $table->boolean('pregnancy_planned');
            $table->boolean('pregnancy_accepted');
            $table->boolean('blood_pressure_issues');
            $table->boolean('infectious_disease');
            $table->boolean('pregnancy_complications');
            $table->text('pregnancy_complications_details')->nullable();
            $table->boolean('medication_use');
            $table->text('medication_details')->nullable();

            // Anamnese - Parto
            $table->boolean('prematurity');
            $table->string('prematurity_details')->nullable();
            $table->enum('birth_type', ['Normal', 'Cesáreo']);
            $table->boolean('birth_complications');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
