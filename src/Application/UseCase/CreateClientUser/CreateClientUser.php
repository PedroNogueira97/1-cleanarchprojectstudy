<?php

declare(strict_types=1);

namespace App\Application\UseCase\CreateClientUser;

use App\Application\UseCase\CreateClientUser\CreateClientUserInputDTO;
use App\Application\UseCase\CreateClientUser\CreateClientUserOutputDTO;
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
use App\Domain\Repositories\TransactionalManagerRepository;

final class CreateClientUser
{
    public function __construct(
        private UserRepository $users,
        private ClientRepository $clients,
        private TransactionalManagerRepository $transaction
        )
    {}

    public function execute(CreateClientUserInputDTO $input): CreateClientUserOutputDTO
    {
        return $this->transaction->transactional(function () use ($input) {
            $user = new User(
                new UUID(),
                new Email($input->email),
                new Password($input->password),
                UserRole::CLIENT,
                new DateTimeImmutable()
            );

            $this->users->save($user);  

            $client = new Client(
                new UUID(),
                new UserId((string) $user->getId()),
                $input->full_name,
                $input->phone,
                $input->address,
                new DateTimeImmutable()
            );

            $this->clients->save($client);

            return new CreateClientUserOutputDTO(
                userId: (string) $user->getId(),
                email: (string) $user->getEmail(),
                full_name: (string) $client->getFullName(),
                phone: (string) $client->getPhone(),
                address: (string) $client->getAddress()
            );
        });
    }     
}