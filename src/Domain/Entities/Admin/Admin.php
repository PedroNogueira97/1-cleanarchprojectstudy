<?php

declare(strict_types=1);

namespace App\Domain\Entities\Admin;

use App\Domain\Shared\ValueObjects\UserId;
use App\Domain\Shared\ValueObjects\UUID;
use DateTimeInterface;
use JsonSerializable;

final class Admin implements JsonSerializable
{
    public function __construct(
        private UUID $id,
        private UserId $user_id,
        private DateTimeInterface $created_at,
    ) {}

    public function jsonSerialize(): mixed
    {
        return [
            'id'         => $this->id->__toString(),
            'user_id'    => $this->user_id->__toString(),
            'created_at' => $this->created_at->format(DateTimeInterface::ATOM),
        ];
    }

    public function getId(): UUID
    {
        return $this->id;
    }

    public function getUserId(): UserId
    {
       return $this->user_id;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->created_at;
    }


}
