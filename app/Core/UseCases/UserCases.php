<?php
namespace App\Core\UseCases;

use App\Core\Repositories\UserRepository;

class CreateUser
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(array $data)
    {
        return $this->userRepository->createUser($data);
    }
}

class UpdateUser
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id, array $data)
    {
        return $this->userRepository->updateUser($id, $data);
    }
}

class DeleteUser
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}

?>