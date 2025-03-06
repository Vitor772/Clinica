<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Execute as migrações.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade'); // Chave estrangeira para paciente
            $table->date('data');
            $table->date('consultation_date'); // Data da consulta
            $table->text('description'); // Descrição da consulta
            $table->timestamps(); // Data de criação e atualização
        });
    }

    /**
     * Reverter as migrações.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
