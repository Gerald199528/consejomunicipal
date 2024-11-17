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
        Schema::create('gasetas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del documento
            $table->string('ruta'); // Ruta del documento
            $table->timestamp('fecha_importacion'); // Fecha de importación
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gasetas');
    }
};
