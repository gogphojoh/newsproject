<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionType extends Controller
{
    use HasFactory;
    protected $table = 'news_views';
    protected $primaryKey = 'id_vista';
    public $incrementing = true;
    protected $fillable = [
        'nombre',
        'codigo',
    ];
    public $timestamps = false;
}


