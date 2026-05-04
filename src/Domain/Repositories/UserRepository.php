<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\User;
use App\Domain\Shared\ValueObjects\UserId;

interface UserRepository
{
    public function save(User $user): void;

    public function findById(UserId $id): ?User;

    public function findAll(): array;

    public function findByEmail(string $email): ?User;
}