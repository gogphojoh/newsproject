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
        Schema::create('news_views', function (Blueprint $table) {
            $table->id('id_vista');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_noticia');
            $table->timestamp('fecha_hora')->nullable();

            $table->foreign('id_usuario')->references('id_usuario')->on('users')->onDelete('cascade');
            $table->foreign('id_noticia')->references('id_noticia')->on('news')->onDelete('cascade');
        });

        DB::table('news_views')->insert([
            'id_vista' => '1',
            'id_usuario' => '1',
            'id_noticia' => '1',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_views');
    }
};
