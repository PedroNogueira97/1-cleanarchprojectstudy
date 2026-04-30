<?php

use App\Domain\AdminContext\Entities\Admin;
use App\Domain\UserContext\Entities\User;
use App\Domain\UserContext\ValueObjects\Email;
use App\Domain\UserContext\ValueObjects\Password;
use App\Domain\UserContext\ValueObjects\UUID;

require __DIR__ . '/../vendor/autoload.php';

$user = new User('client');

$user->setId(new UUID());
$user->setEmail(new Email('pedronogueiraneto@gmail.com'));
$user->setPassword(new Password('12345665'));
$user->setCreatedAt(new DateTimeImmutable());

echo '<pre>'; print_r($user->getId());
echo '<pre>'; print_r($user->getEmail());
echo '<pre>'; print_r($user->getPassword());
echo '<pre>'; print_r($user->getCreatedAt());

echo '<pre>'; print_r($user->getRole());


