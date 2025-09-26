<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aula_id');
            $table->unsignedBigInteger('materia_id')->nullable();
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->unsignedBigInteger('horario_id')->nullable();
            $table->date('fecha')->nullable();
            $table->timestamps();

            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('set null');
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('set null');
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
