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

    public function findAll(): string
    {
        return json_encode(array_values($this->clients), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function findByUserId(UserId $userId): ?Client
    {
        return $this->clients[$userId->__toString()] ?? null;
    }
}