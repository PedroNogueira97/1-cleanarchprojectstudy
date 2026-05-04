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

    public function findAll(): array
    {
        return $this->admins;
    }

    public function findByUserId(UserId $userId): ?Admin
    {
        return $this->admins[$userId->__toString()] ?? null;
    }
}