<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Entities\Admin\Admin;
use App\Domain\Repositories\AdminRepository;
use App\Domain\Shared\ValueObjects\UserId;

class MemoryAdminRepository implements AdminRepository
{
    private array $admins = [];

    public function save(Admin $admin): void
    {   
        $this->admins[$admin->getUserId()->__toString()] = $admin;
    }

    public function findAll(): string
    {
        return json_encode(array_values($this->admins), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function findByUserId(UserId $userId): ?string
    {
        return json_encode($this->admins[$userId->__toString()], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?? null;
    }
}