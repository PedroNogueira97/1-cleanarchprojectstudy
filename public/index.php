<?php

use App\Application\UseCase\CreateAdminUser;
use App\Application\UseCase\CreateClientUser;

use App\Infrastructure\Persistence\MemoryAdminRepository;
use App\Infrastructure\Persistence\MemoryClientRepository;
use App\Infrastructure\Persistence\MemoryUserRepository;

require __DIR__ . '/../vendor/autoload.php';


$userRepo = new MemoryUserRepository();
$adminRepo = new MemoryAdminRepository();
$clientRepo = new MemoryClientRepository();

$useCase = new CreateClientUser($userRepo, $clientRepo);

$useCase->execute(
    'pedro@gmail.com',
    'hash7253648928',
    'Pedro Nogueira',
    '+551489986767',
    'Rua das Palmeiras, 55'
);


var_dump($clientRepo->findAll());




