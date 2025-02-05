<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeaturedNew extends Model
{
    use HasFactory;
    protected $table = 'featured_news';
    protected $primaryKey = 'id_destacado';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'id_noticia',
        'fecha_inicio',
        'fecha_fin',
    ];
    public $timestamps = false;
}
