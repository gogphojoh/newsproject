<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Reglas de validación para crear y actualizar un comentario.
     */
    private $validationRules = [
        'content' => 'required|string|max:500',
        'user_id' => 'required|integer|exists:users,id',
        'post_id' => 'required|integer|exists:posts,id',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $comments = Comment::all();

            return response()->json([
                'success' => true,
                'data' => $comments,
                'message' => 'Comentarios recuperados exitosamente.'
            ], 200);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error al recuperar los comentarios.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validar la solicitud
            $request->validate($this->validationRules);

            // Crear y guardar el comentario
            $comment = Comment::create($request->only(['content', 'user_id', 'post_id']));

            return response()->json([
                'success' => true,
                'message' => 'Comentario creado exitosamente.',
                'data' => $comment
            ], 201);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error al crear el comentario.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $comment = Comment::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $comment,
                'message' => 'Comentario recuperado exitosamente.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return $this->handleException($e, 'Comentario no encontrado.', 404);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error al recuperar el comentario.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validar los datos para la actualización
            $updateRules = [
                'content' => 'nullable|string|max:500',
            ];
            $request->validate($updateRules);

            // Buscar el comentario y actualizarlo
            $comment = Comment::findOrFail($id);
            $comment->update($request->only(['content']));

            return response()->json([
                'success' => true,
                'message' => 'Comentario actualizado exitosamente.',
                'data' => $comment
            ], 200);
        } catch (ModelNotFoundException $e) {
            return $this->handleException($e, 'Comentario no encontrado.', 404);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error al actualizar el comentario.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();

            return response()->json([
                'success' => true,
                'message' => 'Comentario eliminado exitosamente.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return $this->handleException($e, 'Comentario no encontrado.', 404);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Error al eliminar el comentario.');
        }
    }

    /**
     * Manejo centralizado de excepciones.
     */
    private function handleException(\Exception $e, string $customMessage, int $statusCode = 500)
    {
        return response()->json([
            'success' => false,
            'message' => $customMessage,
            'error' => $e->getMessage()
        ], $statusCode);
    }
}
