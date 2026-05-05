<?php

declare(strict_types=1);

namespace App\Application\UseCase\CreateAdminUser;

final class CreateAdminUserInputDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password
    )
    {}
}