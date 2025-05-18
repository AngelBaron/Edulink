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
        Schema::table('alumnos', function (Blueprint $table) {
            $table->foreignId('maestro_id')->nullable()->constrained()->onDelete('cascade')->after('user_id');
            $table->string('nombre_hijo')->nullable()->after('maestro_id');
            $table->string('apaterno_hijo')->nullable()->after('nombre_hijo');
            $table->string('amaterno_hijo')->nullable()->after('apaterno_hijo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropForeign(['maestro_id']);
            $table->dropColumn(['apaterno', 'amaterno', 'maestro_id', 'nombre_hijo', 'apaterno_hijo', 'amaterno_hijo']);
        });
    }
};
