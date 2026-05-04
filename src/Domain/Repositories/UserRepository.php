<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\User;
use App\Domain\Shared\ValueObjects\UserId;

interface UserRepository
{
    public function save(User $user): void;

    public function findById(UserId $id): ?string;

    public function findAll(): string;

    public function findByEmail(string $email): ?string;
}