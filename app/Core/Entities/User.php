<?php

namespace App\Core\Entities;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;



class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['nombre', 'email', 'clave', 'tipo_usuario', 'fecha_registro'];
    public $timestamps = true;
}



