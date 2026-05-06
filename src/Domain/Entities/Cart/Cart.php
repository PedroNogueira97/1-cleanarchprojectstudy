<?php

declare(strict_types=1);

namespace App\Domain\Entities\Cart;

use App\Domain\Shared\ValueObjects\UserId;
use App\Domain\Shared\ValueObjects\UUID;
use DateTimeInterface;
use JsonSerializable;

class Cart implements JsonSerializable
{
    public function __construct(
        private UUID $uuid,
        private UserId $userId,
        private DateTimeInterface $updated_at,
    ){}

    public function jsonSerialize(): mixed
    {
        return [
            'id'         => $this->uuid->__toString(),
            'user_id'    => $this->userId->__toString(),
            'created_at' => $this->updated_at->format(DateTimeInterface::ATOM),
        ];
    }

    public function getUuid(): UUID
    {
        return $this->uuid;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updated_at;
    }
    
}