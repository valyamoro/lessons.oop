<?php
declare(strict_types=1);

namespace App\L_10_02_24\V1;

class Product
{
    public function __construct(
        private int $id,
        private string $title,
        private int $price,
        private int $quantity,
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

    public function saveFile(string $filePath): ?string
    {
        $data = $this->getId() . ', [' . \date('d-m-Y') . ']' . ' title: ' . $this->getTitle() . ', price: ' . $this->getPrice() . ', quantity: ' . $this->getQuantity() . "\n";
        if (\file_exists($filePath)) {
            $content = \file_get_contents($filePath);
            $content .= $data;
        }

        $result = (bool)\file_put_contents($filePath, $content ?? $data);
        return $result ? $data : null;
    }

    public function calculate(array $products): int
    {
        // привести к пср
        $sum = 0;
        // Массив объектов продукт
        foreach ($products as $product) {
            $sum += $product->getPrice() * $product->getQuantity();
        }

        return $sum;
    }

}
