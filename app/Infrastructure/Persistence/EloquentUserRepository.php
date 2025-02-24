<?php
namespace App\Infrastructure\Persistence;

use App\Core\Entities\User;
use App\Core\Repositories\UserRepository;

class EloquentUserRepository implements UserRepository
{
    public function getAllUsers()
    {
        return User::all();  // Correct method to get all users
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function updateUser($id, array $data)
    {
        $user = User::find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function deleteUser($id)
    {
        return User::destroy($id);
    }
}

?>