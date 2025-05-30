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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono')->unique()->nullable();
            $table->string('direccion');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('estado', ['Activo', 'Inactivo', 'Bloqueado'])->default('Inactivo');
            $table->foreignId('rol_id')->nullable()->constrained('roles')->onDelete('set null');
            $table->rememberToken();
            $table->timestamps();
        });

        // ELIMINAR ESTE BLOQUE COMPLETO:
        // Schema::create('password_reset_tokens', function (Blueprint $table) {
        //     $table->string('email')->primary();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        // ELIMINAR ESTA LÍNEA:
        // Schema::dropIfExists('password_reset_tokens');
    }
};