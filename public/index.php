<?php

use App\Application\UseCase\CreateAdminUser;
use App\Application\UseCase\CreateClientUser;
use App\Application\UseCase\CreateProduct;
use App\Domain\Shared\ValueObjects\UserId;

use App\Infrastructure\Persistence\MemoryAdminRepository;
use App\Infrastructure\Persistence\MemoryClientRepository;
use App\Infrastructure\Persistence\MemoryProductRepository;
use App\Infrastructure\Persistence\MemoryUserRepository;

require __DIR__ . '/../vendor/autoload.php';

$productRepo = new MemoryProductRepository();

$useCaseProduct = new CreateProduct($productRepo);

$useCaseProduct->execute(
    "Teclado Mecanico",
    "Excelente teclado mecanico bla bla bla",
    349.99,
    20,
    true,
);



var_dump($productRepo->findAll());

/*$admins = json_decode($adminRepo->findAll(), true);
$firstAdminUserId = $admins[0]['user_id'] ?? null;

if ($firstAdminUserId !== null) {
    var_dump($adminRepo->findByUserId(new UserId($firstAdminUserId)));
}*/




