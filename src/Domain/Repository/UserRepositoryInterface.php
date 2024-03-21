<?php
namespace App\Domain\Repository;

use App\Domain\Dto\UserDto;

interface UserRepositoryInterface 
{
    public function getByID(int $id);
}