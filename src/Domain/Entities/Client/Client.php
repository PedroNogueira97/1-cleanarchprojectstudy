<?php

declare(strict_types=1);

namespace App\Domain\Entities\Client;

use App\Domain\Shared\ValueObjects\UserId;
use App\Domain\Shared\ValueObjects\UUID;
use DateTimeInterface;

final class Client
{

    public function __construct(
       #Create value objects for name, phone and address
        private UUID $id,
        private UserId $user_id,
        private string $full_name,
        private ?string $phone,
        private ?string $address,
        private DateTimeInterface $created_at,
    ) {}

    public function getId(): UUID
    {
        return $this->id;
    }

    public function setId(UUID $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): UserId
    {
        return $this->user_id;
    }

    public function setUserId(UserId $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function setFullName(string $full_name): void
    {
        $this->full_name = $full_name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
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
