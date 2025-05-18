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
        Schema::create('MateriaCalificacion', function (Blueprint $table) {
            $table->foreignId('materia_id')->constrained()->onDelete('cascade');
            $table->foreignId('alumno_id')->constrained()->onDelete('cascade');
            $table->integer('calificacion')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::table('MateriaCalificacion', function (Blueprint $table) {
            $table->dropForeign(['materia_id']);
            $table->dropForeign(['alumno_id']);
        });
        
        Schema::dropIfExists('MateriaCalificacion');

    }
};
