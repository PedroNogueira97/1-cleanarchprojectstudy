<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Domain\Entities\Admin\Admin;
use App\Domain\Entities\User;
use App\Domain\Shared\Enums\UserRole;
use App\Domain\Shared\ValueObjects\Email;
use App\Domain\Shared\ValueObjects\Password;
use App\Domain\Shared\ValueObjects\UserId;
use App\Domain\Shared\ValueObjects\UUID;
use DateTimeImmutable;
use App\Domain\Repositories\UserRepository;
use App\Domain\Repositories\AdminRepository;

final class CreateAdminUser
{
    public function __construct(
        private UserRepository $users,
        private AdminRepository $admins
        )
    {}

    public function execute(
        string $email,
        string $passwordHash
    ): void
    {
        $user = new User(
            new UUID(),
            new Email(($email)),
            new Password($passwordHash),
            UserRole::ADMIN,
            new DateTimeImmutable()
        );

        $this->users->save($user);  

        $admin = new Admin(
            new UUID(),
            new UserId((string) $user->getId()),
            new DateTimeImmutable()
        );

        $this->admins->save($admin);
    }
}