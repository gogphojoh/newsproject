<?php
namespace App\Core\UseCases;

use App\Core\Repositories\UserRepository;

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

?>