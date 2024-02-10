<?php
declare(strict_types=1);

namespace App\L_10_02_24\V1;

class Product
{
    public function __construct(
        private readonly int $id,
        private readonly string $title,
        private readonly int $price,
        private readonly int $quantity,
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

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function productInfo(): string
    {
        return $this->getTitle() . ' ' . $this->getPrice() . ' ' . $this->getQuantity();
    }

}
