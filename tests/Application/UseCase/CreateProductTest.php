<?php

declare(strict_types=1);

namespace Tests\Application\UseCase;

use App\Application\UseCase\CreateProduct\CreateProduct;
use App\Application\UseCase\CreateProduct\CreateProductInputDTO;
use App\Domain\Shared\ValueObjects\UUID;
use PHPUnit\Framework\TestCase;
use App\Infrastructure\Persistence\MemoryProductRepository;

final class CreateProductTest extends TestCase
{
    public function testShouldCreateProduct(): void
    {
        $product = new MemoryProductRepository();

        $useCase = new CreateProduct($product);

        $output = $useCase->execute( 
            new CreateProductInputDTO(
                productId: (string) new UUID(),
                name: 'Teclado Mecanico',
                description: 'teclado foda',
                price: 199.99,
                stock: 20,
                is_active: true,
            )
        );

        $this->assertNotEmpty($output->productId);
        $this->assertCount(1, json_decode($product->findAll(), true));
    }
}