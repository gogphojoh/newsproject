<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id('id_noticia');
            $table->string('titulo');
            $table->text('contenido'); // Use 'text' instead of 'string' for longer content
            $table->string('imagen_portada');
            $table->timestamp('fecha_hora')->default(now()); // Use timestamp instead of string
            $table->unsignedBigInteger('id_autor'); // Foreign key for author
            $table->unsignedBigInteger('id_categoria'); // Foreign key for category
            
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('id_autor')->references('id_autor')->on('author')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id_categoria')->on('categories')->onDelete('cascade');
        });

        DB::table('news')->insert([
            'id_noticia' => '1',
            'titulo' => 'Vaca asesina a una pesona y dos peruanos',
            'contenido' => 'Vaca loca durante una fuga de la granja acaba con la vida de una persona y dos peruanos',
            'imagen_portada' => 'Vaca_antiperuanos.jpg',
            'id_autor' => '1',
            'id_categoria' => '1'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
