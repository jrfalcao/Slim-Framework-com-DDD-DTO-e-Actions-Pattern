<?php
namespace App\Domain\Service;

use App\Domain\Repository\UserRepositoryInterface;

class UserService {
    function __construct(private UserRepositoryInterface $userRepository)  { }

    public function getByID(int $id) 
    {
        $user = $this->userRepository->getByID($id);
        return $user->getArray();
    }
}