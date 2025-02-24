<?php
namespace App\Core\UseCases;

use App\Core\Repositories\UserRepository;

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