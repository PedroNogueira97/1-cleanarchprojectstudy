<?php

declare(strict_types=1);

namespace App\Application\UseCase\CreateClientUser;

final class CreateClientUserOutputDTO
{
    public function __construct(
        public readonly string $userId,
        public readonly string $email,
        public readonly string $full_name,
        public readonly string $phone,
        public readonly string $address
    ){}
}