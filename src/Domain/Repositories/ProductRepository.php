<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Products\Products;

interface ProductRepository
{   
    public function save(Products $product): void;

    public function findAll(): string;
    
    public function findProductById(string $id): ?string;
}