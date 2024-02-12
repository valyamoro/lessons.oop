<?php
declare(strict_types=1);

namespace App\L_10_02_24\V3;

abstract class Product
{
    public function __construct(
        private readonly int $id,
        private readonly string $title,
        private readonly int $quantity,
        private readonly int $price,
        private readonly int $discount,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getDiscount(): int
    {
        return $this->discount;
    }

}
