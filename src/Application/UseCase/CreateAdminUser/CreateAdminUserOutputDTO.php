<?php

declare(strict_types=1);

namespace App\Application\UseCase\CreateAdminUser;

use App\Domain\Shared\Enums\UserRole;

final class CreateAdminUserOutputDTO
{
    public function __construct(
        public readonly string $userId,
        public readonly string $email,
        public readonly UserRole $userRole,
        //public readonly string $created_at
    ){}

}