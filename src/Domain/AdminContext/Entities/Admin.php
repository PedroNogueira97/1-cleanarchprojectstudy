<?php

declare(strict_type=1);

namespace App\Domain\AdminContext\Entities;
use App\Domain\UserContext\ValueObjects\UUID;
use DateTimeInterface;

final class Admin
{
    private UUID $id;
    private string $user_id;
    private DateTimeInterface $created_at;

    public function getId(): UUID
    {
        return $this->id;
    }

    public function setId(UUID $id): void
    {
        $this->id = $id;
    }

    public function setUserId(string $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getUserId(): string
    {
       return $this->user_id;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTimeInterface $created_at): void
    {
        $this->created_at = $created_at;
    }


}