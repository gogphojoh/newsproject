<?php
namespace App\Http\Controllers;

use App\Core\UseCases\CreateUser;
use App\Core\UseCases\UpdateUser;
use App\Core\UseCases\DeleteUser;
use App\Infrastructure\Persistence\EloquentUserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $createUser;
    protected $updateUser;
    protected $deleteUser;
    protected $userRepository;

    public function __construct(EloquentUserRepository $userRepository, CreateUser $createUser, UpdateUser $updateUser, DeleteUser $deleteUser)
    {
        $this->userRepository = $userRepository;
        $this->createUser = $createUser;
        $this->updateUser = $updateUser;
        $this->deleteUser = $deleteUser;
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
        $user = $this->createUser->execute($request->all());
        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = $this->updateUser->execute($id, $request->all());
        return $user ? response()->json($user) : response()->json(['message' => 'User not found'], 404);
    }

    public function destroy($id)
    {
        $deleted = $this->deleteUser->execute($id);
        return $deleted ? response()->json(['message' => 'User deleted']) : response()->json(['message' => 'User not found'], 404);
    }
}
?>