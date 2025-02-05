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
        Schema::create('author', function (Blueprint $table) {
            $table->id('id_autor');
            $table->string('nombre');
            $table->string('imagen_autor');
            $table->string('biografia');
            $table->timestamps();
        });

        DB::table('author')->insert([
            'id_autor' => '1',
            'nombre' => 'Juanjo',
            'imagen_autor' => 'juanjo.png',
            'biografia' => 'Soy un periodista que toma fotografías chistosas y de paso escribe textos.'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author');
    }
};
