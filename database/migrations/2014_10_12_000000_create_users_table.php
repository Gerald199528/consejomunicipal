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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('apellido')->nullable();
            $table->string('nivel_de_acceso')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(true); // Añadir el campo status
            $table->string('motivo')->default('Sin motivo'); // Esto establece un valor predeterminado
            $table->date('fecha_egreso')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('imagens', function (Blueprint $table) {
            $table->bigIncrements('id_img');
            $table->unsignedBigInteger('id'); // relación con usuario
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagens');
        Schema::dropIfExists('users');
    }
};