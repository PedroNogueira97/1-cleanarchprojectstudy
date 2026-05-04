<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Entities\Client\Client;
use App\Domain\Repositories\ClientRepository;
use App\Domain\Shared\ValueObjects\UserId;

class MemoryClientRepository implements ClientRepository
{
    private array $clients = [];

    public function save(Client $client): void
    {
        $this->clients[$client->getUserId()->__toString()] = $client;
    }

    public function findAll(): array
    {
        return $this->clients;
    }

    public function findByUserId(UserId $userId): ?Client
    {
        return $this->clients[$userId->__toString()] ?? null;
    }
}