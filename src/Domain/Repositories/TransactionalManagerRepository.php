<?php

namespace App\Domain\Repositories;

interface TransactionalManagerRepository
{
    public function transactional(callable $callback): mixed;
}