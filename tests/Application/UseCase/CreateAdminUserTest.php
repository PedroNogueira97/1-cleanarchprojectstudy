<?php

declare(strict_types=1);

namespace Tests\Application\UseCase;

use PHPUnit\Framework\TestCase;
use App\Application\UseCase\CreateAdminUser\CreateAdminUser;
use App\Application\UseCase\CreateAdminUser\CreateAdminUserInputDTO;
use App\Infrastructure\Persistence\MemoryUserRepository;
use App\Infrastructure\Persistence\MemoryAdminRepository;
use App\Infrastructure\Persistence\MemoryTransactionManagerRepository;

final class CreateAdminUserTest extends TestCase
{
    public function testShouldCreateAdminUser(): void
    {
        $users = new MemoryUserRepository();
        $admins = new MemoryAdminRepository();
        $transaction = new MemoryTransactionManagerRepository();

        $useCase = new CreateAdminUser($users, $admins, $transaction);

        $output = $useCase->execute(
            new CreateAdminUserInputDTO(
                email: 'admin@email.com',
                password: '123456'
            )
        );

        $this->assertNotEmpty($output->userId);
        $this->assertCount(1, json_decode($users->findAll(), true));
        $this->assertCount(1, json_decode($admins->findAll(), true));
    }
}