<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones (crea la tabla).
     */
    public function up(): void
    {
        Schema::create('historial_aire_acondicionados', function (Blueprint $table) {
            // Clave primaria
            $table->id();

            // Clave foránea (Foreign Key) para AireAcondicionado
            // Asume que tienes una tabla 'aire_acondicionados'
            $table->foreignId('aire_id')
                  ->constrained('aire_acondicionados') // Enlaza a la tabla plural del modelo AireAcondicionado
                  ->onDelete('cascade'); // Opcional: si se borra el aire acondicionado, se borra su historial.

            // Campos del historial
            $table->decimal('temperatura', 4, 1); // 4 dígitos en total, 1 decimal (ej: 25.5)

            // Campos de tiempo (asumiendo que son el inicio y fin del uso)
            $table->dateTime('inicio');
            $table->dateTime('fin')->nullable(); // 'fin' puede ser nulo si el uso está en curso.

            // Timestamps automáticos (created_at y updated_at)
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones (elimina la tabla).
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_aire_acondicionados');
    }
};