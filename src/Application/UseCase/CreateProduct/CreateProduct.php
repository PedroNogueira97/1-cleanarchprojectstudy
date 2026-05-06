<?php

declare(strict_types=1);

namespace App\Application\UseCase\CreateProduct;

use App\Application\UseCase\CreateProduct\CreateProductInputDTO;
use App\Application\UseCase\CreateProduct\CreateProductOutputDTO;
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

    public function execute(CreateProductInputDTO $input): CreateProductOutputDTO {

        $product = new Products(
            new UUID(),
            $input->name,
            $input->description,
            $input->price,
            $input->stock,
            $input->is_active,
            new DateTimeImmutable(),
        );

        $this->products->save($product);

        return new CreateProductOutputDTO(
            productId: (string) $product->getId(),
            name: (string) $product->getProductName(),
            description: (string) $product->getProductDescription(),
            price: (float) $product->getProductPrive(),
            stock: (int) $product->getProductStock(),
            is_active: (bool) $product->isActive()
        );
    }
}