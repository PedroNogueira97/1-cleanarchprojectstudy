<?php

declare(strict_type=1);

namespace App\Domain\UserContext\Entities;

use App\Domain\AdminContext\Entities\Admin;
use App\Domain\ClientContext\Entities\Client;
use App\Domain\UserContext\ValueObjects\Email;
use App\Domain\UserContext\ValueObjects\Password;
use App\Domain\UserContext\ValueObjects\UUID;

use DateTimeInterface;

final class User      
{
    private UUID $id;
    private Email $email;
    private Password $password;
    private object $role;  

    public function __construct(string $role)
    {
        $map = [
            'admin' => Admin::class,
            'client'  => Client::class,
        ];

        if (!isset($map[$role])) {
            throw new \InvalidArgumentException("Role not implemented: $role");
        }

        $this->role = new $map[$role]();
    }

    public function getRole(): object
    {
        return $this->role;
    }

    private DateTimeInterface $created_at;

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