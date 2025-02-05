<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suscription extends Model
{
    use HasFactory;
    protected $table = 'suscriptions';
    protected $primaryKey = 'id_suscripcion';
    public $incrementing = true;
    protected $fillable = [
        'id_usuario',
        'fecha_inicio',
        'fecha_fin',
    ];
    public $timestamps = false;
}
