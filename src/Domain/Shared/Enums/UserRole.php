<?php

declare(strict_types=1);

namespace App\Domain\Shared\Enums;

use App\Domain\Entities\Admin\Admin;
use App\Domain\Entities\Client\Client;

enum UserRole: string
{
    case ADMIN = Admin::class;
    case CLIENT = Client::class;
}