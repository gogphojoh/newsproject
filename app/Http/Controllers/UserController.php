<?php
namespace App\Http\Controllers;

use App\Infrastructure\Persistence\EloquentUserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(EloquentUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return response()->json($this->userRepository->getAllUsers());
    }

    public function show($id)
    {
        $user = $this->userRepository->getUserById($id);
        return $user ? response()->json($user) : response()->json(['message' => 'User not found'], 404);
    }

    public function store(Request $request)
    {
        $user = $this->userRepository->createUser($request->all());
        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->updateUser($id, $request->all());
        return $user ? response()->json($user) : response()->json(['message' => 'User not found'], 404);
    }

    public function destroy($id)
    {
        $deleted = $this->userRepository->deleteUser($id);
        return $deleted ? response()->json(['message' => 'User deleted']) : response()->json(['message' => 'User not found'], 404);
    }
}

?>