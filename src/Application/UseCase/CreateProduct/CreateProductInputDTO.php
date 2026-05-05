<?php

declare(strict_types=1);

namespace App\Application\UseCase\CreateProduct;

final class CreateProductInputDTO
{
    public function __construct(
        public readonly string $productId,
        public readonly string $name,
        public readonly string $description,
        public readonly float $price,
        public readonly int $stock,
        public readonly bool $is_active,
    ){}
}