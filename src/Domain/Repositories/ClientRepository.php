<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Admin\Admin;
use App\Domain\Entities\Client\Client;
use App\Domain\Shared\ValueObjects\UserId;

interface ClientRepository
{
    public function save(Client $client): void;

    public function findAll(): array;
    
    public function findByUserId(UserId $userId): ?Client;
    
}