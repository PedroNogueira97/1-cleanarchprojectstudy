<?php

declare(strict_types=1);

namespace App\Domain\Entities\Cart\CartItem;

use App\Domain\Entities\Cart\Cart;
use App\Domain\Entities\Products\Products;
use App\Domain\Shared\ValueObjects\UUID;
use App\Domain\Shared\ValueObjects\UserId;
use DateTimeInterface;
use DomainException;

final class CartItem extends Cart
{
    public function __construct(
        UUID $uuid,
        UserId $userId,
        DateTimeInterface $updated_at,
        Products $products,
        private string $id,
        private string $cart_id,
        private string $product_id,
        private int $quantity,
    ) {
        parent::__construct($uuid, $userId, $updated_at);
        $this->ensureValidQuantity($quantity);
        $this->product_id = $products->getId()->__toString();
    }

    public function jsonSerialize(): mixed
    {
        return [
            ...parent::jsonSerialize(),
            'cart_item_id' => $this->id,
            'cart_id' => $this->cart_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
        ];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCartId(): string
    {
        return $this->cart_id;
    }

    public function getProductId(): string
    {
        return $this->product_id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function changeQuantity(int $quantity): void
    {
        $this->ensureValidQuantity($quantity);
        $this->quantity = $quantity;
    }

    private function ensureValidQuantity(int $quantity): void
    {
        if ($quantity <= 0) {
            throw new DomainException('Quantity must be greater than zero.');
        }
    }
}