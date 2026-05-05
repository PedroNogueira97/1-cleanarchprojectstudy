<?php

use App\Application\UseCase\CreateAdminUser\CreateAdminUser;
use App\Application\UseCase\CreateAdminUser\CreateAdminUserInputDTO;
use App\Application\UseCase\CreateClientUser\CreateClientUser;
use App\Application\UseCase\CreateProduct;
use App\Domain\Repositories\UserRepository;
use App\Domain\Shared\ValueObjects\UserId;

use App\Infrastructure\Persistence\MemoryAdminRepository;
use App\Infrastructure\Persistence\MemoryClientRepository;
use App\Infrastructure\Persistence\MemoryProductRepository;
use App\Infrastructure\Persistence\MemoryUserRepository;

require __DIR__ . '/../vendor/autoload.php';









