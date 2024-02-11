<?php
declare(strict_types=1);

namespace App\L_10_02_24\V1;

class Order
{
    private array $products;
    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function calculate(): int
    {
        $sum = 0;

        foreach ($this->getProducts() as $product) {
            $sum += $product->getPrice() * $product->getQuantity();
        }

        return $sum;
    }

}
