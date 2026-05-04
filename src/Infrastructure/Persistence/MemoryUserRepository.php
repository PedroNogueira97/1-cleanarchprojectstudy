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

    public function findById(UserId $id): ?string
    {
        return json_encode(array_values($this->users[$id->__toString()])) ?? null;

    }

   
    public function findAll(): string
    {
        return json_encode(array_values($this->users), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function findByEmail(string $email): ?string
    {
        return json_encode(array_values($this->users[$email]), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}