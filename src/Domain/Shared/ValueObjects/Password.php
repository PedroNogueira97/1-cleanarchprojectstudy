<?php

declare(strict_types=1);

namespace App\Domain\Shared\ValueObjects;

use DomainException;

final class Password
{
    private string $hashedPassword;

    public function __construct(string $plainPassword)
    {
        if (!$this->isValid($plainPassword)) {
            throw new DomainException('Password is not valid. It must be at least 6 characters.');
        }
        $this->hashedPassword = md5($plainPassword);
    }

    /**
     * Simple password validation, for example, minimum length.
     */
    private function isValid(string $password): bool
    {
        return strlen($password) >= 6;
    }

    /**
     * Get the hashed password. (Not the plain password)
     */
    public function __toString(): string
    {
        return $this->hashedPassword;
    }
}