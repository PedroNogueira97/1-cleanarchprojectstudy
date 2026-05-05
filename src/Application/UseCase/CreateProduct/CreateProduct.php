<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Domain\Entities\Products\Products;
use App\Domain\Repositories\ProductRepository;
use App\Domain\Shared\ValueObjects\UUID;
use DateTimeImmutable;

final class CreateProduct
{
    public function __construct(
        private ProductRepository $products
    )
    {}

    public function execute(
        string $name,
        string $description,
        float $price,
        int $stock,
        bool $is_active,
    ): void {

        $product = new Products(
            new UUID(),
            $name,
            $description,
            $price,
            $stock,
            $is_active,
            new DateTimeImmutable(),
        );

        $this->products->save($product);
    }
}