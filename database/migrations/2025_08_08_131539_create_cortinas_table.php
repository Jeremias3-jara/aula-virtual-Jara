<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cortinas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo')->nullable();
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('aula_id')->nullable();
            $table->timestamps();

            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cortinas');
    }
};
