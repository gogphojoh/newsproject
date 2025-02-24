<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\QuestionType;

class QuestionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //manejar data y hacer manejo de errores.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Lo correcto para comprobar datos es que aparte de hacer un requiere y también definir un tipo de dato.
        try {
            // Validar la solicitud
            $request->validate([
                'nombre' => 'required|string|max:255',
                'codigo' => 'required|string|max:50'
            ]);
    
            // Crear y guardar el nuevo registro
            $type = QuestionType::create([
                'nombre' => $request->nombre,
                'codigo' => $request->codigo
            ]);
    
            // Respuesta exitosa con código 201 (Created)
            return response()->json([
                'success' => true,
                'message' => 'Tipo de pregunta creado exitosamente.',
                'data' => $type
            ], 201);
        } catch (\Exception $e) {
            // Manejo de errores con código 500
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el tipo de pregunta.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
