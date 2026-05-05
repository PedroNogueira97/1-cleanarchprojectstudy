<?php

declare(strict_types=1);

namespace Tests\Application\UseCase;

use App\Application\UseCase\CreateClientUser\CreateClientUser;
use PHPUnit\Framework\TestCase;
use App\Application\UseCase\CreateClientUser\CreateClientUserInputDTO;
use App\Infrastructure\Persistence\MemoryUserRepository;
use App\Infrastructure\Persistence\MemoryClientRepository;
use App\Infrastructure\Persistence\MemoryTransactionManagerRepository;

final class CreateClientUserTest extends TestCase
{
    public function testShouldCreateClientUser(): void
    {
        $users = new MemoryUserRepository();
        $clients = new MemoryClientRepository();
        $transaction = new MemoryTransactionManagerRepository();

        $useCase = new CreateClientUser($users, $clients, $transaction);

        $output = $useCase->execute( 
            new CreateClientUserInputDTO(
                email: 'admin@email.com',
                password: '123456',
                full_name: 'PEdro Neto',
                phone: '+55147364528',
                address: 'Rua Minas Gerais, 550'
            )
        );

        $this->assertNotEmpty($output->userId);
        $this->assertCount(1, json_decode($users->findAll(), true));
        $this->assertCount(1, json_decode($clients->findAll(), true));
    }
}