<?php

   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   class CrearAcuerdos extends Migration
   {
       /**
        * Run the migrations.
        *
        * @return void
        */
       public function up()
       {
           Schema::create('acuerdos', function (Blueprint $table) {
               $table->id(); // Crea una columna 'id' auto-incremental
               $table->string('nombre'); // Nombre del acuerdo
               $table->string('ruta'); // Ruta del archivo
               $table->timestamp('fecha_importacion')->nullable(); // Fecha de importación
               $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
           });
       }

       /**
        * Reverse the migrations.
        *
        * @return void
        */
       public function down()
       {
           Schema::dropIfExists('acuerdos');
       }
   }