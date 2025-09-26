<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historial_focos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('foco_id')->nullable();
            $table->string('accion')->nullable();
            $table->timestamp('fecha')->nullable();
            $table->timestamps();

            $table->foreign('foco_id')->references('id')->on('focos')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_focos');
    }
};
