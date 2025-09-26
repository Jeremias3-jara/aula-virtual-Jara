<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('muebles', function (Blueprint $table) {
            $table->id();
            $table->string('tipo')->nullable();
            $table->integer('cantidad')->default(1);
            $table->unsignedBigInteger('aula_id')->nullable();
            $table->timestamps();

            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('muebles');
    }
};
