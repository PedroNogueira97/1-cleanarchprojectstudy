<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Admin\Admin;
use App\Domain\Shared\ValueObjects\UserId;

interface AdminRepository
{
    public function save(Admin $admin): void;

    public function findAll(): array;
    
    public function findByUserId(UserId $userId): ?Admin;
    
}