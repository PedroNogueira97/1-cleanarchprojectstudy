<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Domain\Entities\Client\Client;
use App\Domain\Entities\User;
use App\Domain\Shared\Enums\UserRole;
use App\Domain\Shared\ValueObjects\Email;
use App\Domain\Shared\ValueObjects\Password;
use App\Domain\Shared\ValueObjects\UserId;
use App\Domain\Shared\ValueObjects\UUID;
use DateTimeImmutable;
use App\Domain\Repositories\UserRepository;
use App\Domain\Repositories\ClientRepository;

final class CreateClientUser
{
    public function __construct(
        private UserRepository $users,
        private ClientRepository $clients
        )
    {}

    public function execute(
        string $email,
        string $passwordHash,
        string $full_name,
        string $phone,
        string $address
    ): void
    {
        $user = new User();
        $user->setId(new UUID());
        $user->setEmail(new Email(($email)));
        $user->setPassword(new Password($passwordHash));
        $user->setUserRole(UserRole::CLIENT);
        $user->setCreatedAt(new DateTimeImmutable());

        $this->users->save($user);  

        $client = new Client(
            new UUID(),
            new UserId((string) $user->getId()),
            $full_name,
            $phone,
            $address,
            new DateTimeImmutable()
        );

        $this->clients->save($client);
    }     
}