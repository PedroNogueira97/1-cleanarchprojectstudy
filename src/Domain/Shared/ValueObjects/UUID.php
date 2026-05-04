<?php

declare(strict_types=1);

namespace App\Domain\Shared\ValueObjects;

use DomainException;

final class UUID
{
    private string $uuid;

    public function __construct(?string $uuid = null)
    {
        if ($uuid === null) {
            $uuid = $this->generateV4();
        }

        if (!$this->isValid($uuid)) {
            throw new DomainException('Invalid UUID format.');
        }
        $this->uuid = $uuid;
    }

    private function generateV4(): string
    {
        // Generate a version 4 (random) UUID.
        $data = random_bytes(16);
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40); // version 4
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80); // variant 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    private function isValid(string $uuid): bool
    {
        return preg_match(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i',
            $uuid
        ) === 1;
    }

    public function __toString(): string
    {
        return $this->uuid;
    }
}