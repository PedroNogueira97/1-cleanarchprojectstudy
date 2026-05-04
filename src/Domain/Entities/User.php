<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\Shared\Enums\UserRole;
use App\Domain\Shared\ValueObjects\Email;
use App\Domain\Shared\ValueObjects\Password;
use App\Domain\Shared\ValueObjects\UUID;
use JsonSerializable;

use DateTimeInterface;

final class User implements JsonSerializable
{

    public function __construct(
        private UUID $id,
        private Email $email,
        private Password $password,
        private UserRole $role,
        private DateTimeInterface $created_at,
    )
    {}

    public function jsonSerialize(): mixed
    {
        return [
            'id'         => $this->id->__toString(),
            'email'      => $this->email->__toString(),
            'password'   => $this->password->__toString(),
            'UserRole'   => $this->role,
            'created_at' => $this->created_at->format(DateTimeInterface::ATOM),
        ];
    }

    public function getUserRole(): UserRole
    {
        return $this->role;
    }

    public function getId(): UUID
    {
        return $this->id;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }


    public function getPassword(): Password
    {
        return $this->password;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->created_at;
    }
    

}