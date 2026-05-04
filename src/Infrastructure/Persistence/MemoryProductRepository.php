<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Entities\Products\Products;
use App\Domain\Repositories\ProductRepository;

class MemoryProductRepository implements ProductRepository
{
    private array $products = [];

    public function save(Products $product): void
    {
        $this->products[(string)$product->getId()] = $product;
    }

    public function findAll(): string
    {
        return json_encode(array_values($this->products), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function findProductById(string $id): ?string
    {
        if (isset($this->products[$id])) {
            return json_encode($this->products[$id], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
        return null;
    }
}