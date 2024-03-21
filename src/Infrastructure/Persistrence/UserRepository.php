<?php

namespace App\Infrastructure\Persistrence;

use App\Domain\Repository\UserRepositoryInterface;
use App\Domain\Dto\UserDto;
use Doctrine\ORM\EntityManager;
// use App\Domain\Model\User;

final class UserRepository implements UserRepositoryInterface
{
    private EntityManager $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getByID(int $id)
    {
        $user = $this->em->find('App\Domain\Model\User', $id);
        $userDTO = new UserDto($id, $user->getNome(), $user->getEmail());
        return $userDTO;
    }
}