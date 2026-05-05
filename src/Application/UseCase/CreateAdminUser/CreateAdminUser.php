<?php

declare(strict_types=1);

namespace App\Application\UseCase\CreateAdminUser;

use App\Application\UseCase\CreateAdminUser\CreateAdminUserInputDTO;
use App\Application\UseCase\CreateAdminUser\CreateAdminUserOutputDTO;
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

    public function execute(CreateAdminUserInputDTO $input): CreateAdminUserOutputDTO
    {
        $user = new User(
            new UUID(),
            new Email($input->email),
            new Password($input->password),
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

        return new CreateAdminUserOutputDTO(
            userId: (string) $user->getId(),
            email: (string) $user->getEmail(),
            userRole: $user->getUserRole(),
            //created_at: (string) $user->getCreatedAt()
        );
    }
}