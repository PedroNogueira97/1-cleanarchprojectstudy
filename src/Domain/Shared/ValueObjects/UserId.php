<?php

declare(strict_type=1);

namespace App\Domain\Shared\ValueObjects;

use App\Domain\Entities\User;

final class UserId
{

    private string $userId;
    
    public function __construct(string $user_id)
    {
        $this->userId = $user_id;
    }

    public function __toString(): string
    {
        return $this->userId;
    }
}