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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('id_comentario');
            $table->unsignedBigInteger('id_noticia');
            $table->unsignedBigInteger('id_usuario');
            $table->text('contenido');
            $table->timestamp('fecha_hora')->nullable();

            $table->foreign('id_usuario')->references('id_usuario')->on('users')->onDelete('cascade');
            $table->foreign('id_noticia')->references('id_noticia')->on('news')->onDelete('cascade');
        });


        DB::table('comments')->insert([
            'id_comentario' => '1',
            'id_usuario' => '1',
            'id_noticia' => '1',
            'contenido' => '¿Cuanto pesan en promedio las vacas?'
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
