<?php

use App\Application\UseCase\CreateAdminUser\CreateAdminUser;
use App\Application\UseCase\CreateAdminUser\CreateAdminUserInputDTO;
use App\Application\UseCase\CreateClientUser;
use App\Application\UseCase\CreateProduct;
use App\Domain\Repositories\UserRepository;
use App\Domain\Shared\ValueObjects\UserId;

use App\Infrastructure\Persistence\MemoryAdminRepository;
use App\Infrastructure\Persistence\MemoryClientRepository;
use App\Infrastructure\Persistence\MemoryProductRepository;
use App\Infrastructure\Persistence\MemoryUserRepository;

require __DIR__ . '/../vendor/autoload.php';

$userRepository = new MemoryUserRepository();
$adminRepository = new MemoryAdminRepository();

$useCase = new CreateAdminUser($userRepository, $adminRepository);

$useCaseInputDto = new CreateAdminUserInputDTO('pedronogueiraneto@gmail.com', '32423423jh342hg324');

$result = $useCase->execute($useCaseInputDto);

var_dump($result);







