<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'id_comentario';
    public $incrementing = true;
    protected $fillable = [
        'id_noticia',
        'id_usuario',
        'contenido',
        'fecha_hora',
    ];
    public $timestamps = false;
}
