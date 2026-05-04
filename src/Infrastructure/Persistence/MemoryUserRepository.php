<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Entities\User;
use App\Domain\Repositories\UserRepository;
use App\Domain\Shared\ValueObjects\UserId;

class MemoryUserRepository implements UserRepository
{

    private array $users = [];

    public function save(User $user): void
    {
        $this->users[$user->getId()->__toString()] = $user;

    }

    public function findById(UserId $id): ?User
    {
        return $this->users[$id->__toString()] ?? null;

    }

   
    public function findAll(): array
    {
        return $this->users;
    }

    public function findByEmail(string $email): ?User
    {
        return $this->users[$email];
    }
}