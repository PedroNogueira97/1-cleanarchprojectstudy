<?php

declare(strict_types=1);

namespace App\Domain\Entities\Products;

use App\Domain\Shared\ValueObjects\UUID;
use DateTimeInterface;
use JsonSerializable;

final class Products implements JsonSerializable
{

    private DateTimeInterface $updated_at;
    private int $created_by_admin_id;
    private int $updated_by_admin_id;

    public function __construct(
        private UUID $id,
        private string $product_name,
        private string $product_description,
        private float $product_price,
        private int $product_stock,
        private bool $is_active,
        private DateTimeInterface $created_at,
    ) {}

        public function jsonSerialize(): mixed
        {
            return [
                'id'                    => $this->id->__toString(),
                'product_name'          => $this->product_name,
                'product_description'   => $this->product_description,
                'product_price'         => $this->product_price,
                '$product_stock'        => $this->product_stock,
                'is_active'             => $this->is_active,
                'created_at'            => $this->created_at->format(DateTimeInterface::ATOM),
            ];
        }

        public function getId(): UUID
        {
            return $this->id;
        }

        public function getProductName(): string
        {
            return $this->product_name;
        }

        public function getProductDescription(): string
        {
            return $this->product_description;
        }

        public function getProductPrive(): float
        {
            return $this->product_price;
        }

        public function getProductStock(): int
        {
            return $this->product_stock;
        }

        public function isActive(): bool
        {
            return $this->is_active;
        }

        public function getCreatedAt(): DateTimeInterface
        {
            return $this->created_at;
        }

        public function getUpdatedAt(): DateTimeInterface
        {
            return $this->updated_at;
        }

        public function getCreatedByAdminId(): int
        {
            return $this->created_by_admin_id;
        }

        public function getUpdatedByAdminId(): int
        {
            return $this->updated_by_admin_id;
        }
}