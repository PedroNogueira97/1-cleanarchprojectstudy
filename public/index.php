<?php

use App\Application\UseCase\CreateAdminUser;
use App\Application\UseCase\CreateClientUser;
use App\Domain\Shared\ValueObjects\UserId;

use App\Infrastructure\Persistence\MemoryAdminRepository;
use App\Infrastructure\Persistence\MemoryClientRepository;
use App\Infrastructure\Persistence\MemoryUserRepository;

require __DIR__ . '/../vendor/autoload.php';


$userRepo = new MemoryUserRepository();
$adminRepo = new MemoryAdminRepository();
$clientRepo = new MemoryClientRepository();

$useCase = new CreateClientUser($userRepo, $clientRepo);
$useCase2 = new CreateAdminUser($userRepo, $adminRepo);

$useCase->execute(
    'pedro@gmail.com',
    'hash7253648928',
    'Pedro Nogueira',
    '+551489986767',
    'Rua das Palmeiras, 55'
);

$useCase2->execute(
    'pedronogu@gmail.com',
    'hash7253648928',
);


var_dump($userRepo->findAll());

/*$admins = json_decode($adminRepo->findAll(), true);
$firstAdminUserId = $admins[0]['user_id'] ?? null;

if ($firstAdminUserId !== null) {
    var_dump($adminRepo->findByUserId(new UserId($firstAdminUserId)));
}*/




