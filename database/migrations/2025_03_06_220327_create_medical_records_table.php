<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade'); // Relacionamento com patients
            $table->date('data');
            $table->text('medical_history')->nullable();
            $table->text('initial_demand')->nullable();
            $table->text('treatment_goals')->nullable();
            $table->text('evolution')->nullable();
            $table->text('general_info')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
};
