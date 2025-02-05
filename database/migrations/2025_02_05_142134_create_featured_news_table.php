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
        Schema::create('featured_news', function (Blueprint $table) {
            $table->id('id_destacado');
            $table->unsignedBigInteger('id_noticia');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();
            
            $table->foreign('id_noticia')->references('id_noticia')->on('news')->onDelete('cascade');
        });

        DB::table('featured_news')->insert([
            'id_destacado' => '1',
            'id_noticia' => '1',
            'fecha_inicio' => '2025-01-30',
            'fecha_fin' => '2025-02-28'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_news');
    }
};
