<?php

namespace App\L_10_02_24\V1;

class BookProduct extends Product
{
    public function __construct(
        readonly int $id,
        readonly string $title,
        readonly int $price,
        readonly int $quantity,
        private readonly int $discount = 0,
        private readonly int $numPage = 0,
        private readonly int $length = 0,
    ) {
        parent::__construct($id, $title, $price, $quantity, $discount, $numPage, $length);
    }

    public function getDiscount(): int
    {
        return $this->discount;
    }

    public function getNumPage(): int
    {
        return $this->numPage;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function productInfo(): string
    {
        return parent::productInfo() . ' ' . $this->getNumPage();
    }

}
