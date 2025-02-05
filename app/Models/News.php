<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $primaryKey = 'id_noticia';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'titulo',
        'contenido',
        'imagen_portada',
        'fecha_hora',
        'id_autor',
        'id_categoria',
    ];
    public $timestamps = false;
}
