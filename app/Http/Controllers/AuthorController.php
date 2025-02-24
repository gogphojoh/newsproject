<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $authors = Author::all();

            return response()->json([
                'success' => true,
                'message' => 'Autores obtenidos exitosamente.',
                'data' => $authors
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los autores.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validar la solicitud
            $request->validate([
                'nombre' => 'required|string|max:255',
                'imagen_autor' => 'nullable|url|max:500',
                'biografia' => 'nullable|string|max:1000'
            ]);

            // Crear y guardar el nuevo autor
            $author = Author::create([
                'nombre' => $request->nombre,
                'imagen_autor' => $request->imagen_autor,
                'biografia' => $request->biografia
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Autor creado exitosamente.',
                'data' => $author
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el autor.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $author = Author::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Autor obtenido exitosamente.',
                'data' => $author
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Autor no encontrado.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el autor.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validar la solicitud
            $request->validate([
                'nombre' => 'sometimes|required|string|max:255',
                'imagen_autor' => 'nullable|url|max:500',
                'biografia' => 'nullable|string|max:1000'
            ]);

            $author = Author::findOrFail($id);

            // Actualizar los datos del autor
            $author->update($request->only(['nombre', 'imagen_autor', 'biografia']));

            return response()->json([
                'success' => true,
                'message' => 'Autor actualizado exitosamente.',
                'data' => $author
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Autor no encontrado.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el autor.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $author = Author::findOrFail($id);

            // Eliminar el autor
            $author->delete();

            return response()->json([
                'success' => true,
                'message' => 'Autor eliminado exitosamente.'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Autor no encontrado.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el autor.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
