<?php
declare(strict_types=1);

namespace App\L_10_02_24\V3;

class BookProduct extends Product
{
    public function __construct(
        readonly int $id,
        readonly string $title,
        readonly int $quantity,
        readonly int $price,
        readonly int $discount,
        private readonly int $numPage,
    ) {
        parent::__construct($this->id, $this->title, $this->quantity, $this->price, $this->discount);
    }

    public function getNumPage(): int
    {
        return $this->numPage;
    }

}

