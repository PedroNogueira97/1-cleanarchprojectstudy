<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\Shared\Enums\UserRole;
use App\Domain\Shared\ValueObjects\Email;
use App\Domain\Shared\ValueObjects\Password;
use App\Domain\Shared\ValueObjects\UUID;

use DateTimeInterface;

final class User      
{

    private UUID $id;
    private Email $email;
    private Password $password;
    private UserRole $role;
    private DateTimeInterface $created_at;


    public function getUserRole(): UserRole
    {
        return $this->role;
    }

    public function setUserRole(UserRole $user_role): void
    {
        $this->role = $user_role;
    }

    public function getId(): UUID
    {
        return $this->id;
    }

    public function setId(UUID $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function setPassword(Password $password): void
    {
        $this->password = $password;
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