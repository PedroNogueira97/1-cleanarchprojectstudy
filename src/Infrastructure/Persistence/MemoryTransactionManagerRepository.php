<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\TransactionalManagerRepository;

class MemoryTransactionManagerRepository implements TransactionalManagerRepository
{
    public function transactional(callable $callback): mixed
    {
        return $callback();
    }
}