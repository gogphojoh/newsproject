<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsView extends Model
{
    use HasFactory;
    protected $table = 'news_views';
    protected $primaryKey = 'id_vista';
    public $incrementing = true;
    protected $fillable = [
        'id_usuario',
        'id_noticia',
        'fecha_hora',
    ];
    public $timestamps = false;
}
