<?php

declare(strict_types=1);

namespace App\Domain\Shared\ValueObjects;


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