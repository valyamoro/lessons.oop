<?php
declare(strict_types=1);

namespace App\L_10_02_24\V2;

abstract class Product
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

    public static function create(array $data): array
    {
        $result = [];

        foreach ($data as $item) {
            if ($item['type'] === 'book') {
                $result[] = new BookProduct(
                    (int)$item['id'],
                    $item['title'],
                    (int)$item['price'],
                    (int)$item['quantity'],
                    (int)$item['discount'],
                    (int)$item['num_page'],
                );
            } else {
                $result[] = new CDProduct(
                    (int)$item['id'],
                    $item['title'],
                    (int)$item['price'],
                    (int)$item['quantity'],
                    (int)$item['discount'],
                    (int)$item['num_page'],
                );
            }

        }

        return $result;
    }

}
