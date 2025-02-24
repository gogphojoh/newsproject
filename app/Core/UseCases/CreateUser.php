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