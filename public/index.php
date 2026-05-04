<?php

use App\Domain\Entities\Admin\Admin;
use App\Domain\Entities\User;
use App\Domain\Shared\Enums\UserRole;
use App\Domain\Shared\ValueObjects\Email;
use App\Domain\Shared\ValueObjects\Password;
use App\Domain\Shared\ValueObjects\UUID;

require __DIR__ . '/../vendor/autoload.php';

$user = new User();
$user->setId(new UUID());
$user->setEmail(new Email(('pedronogueiraneto@gmail.com')));
$user->setPassword(new Password('123456432333545'));
$user->setUserRole(UserRole::ADMIN);
$user->setCreatedAt(new DateTimeImmutable(''));

$admin = new Admin(new UUID(), (string) $user->getId(), new DateTimeImmutable(''));

echo '<pre>'; print_r($user);
echo '<pre>'; print_r($admin);




