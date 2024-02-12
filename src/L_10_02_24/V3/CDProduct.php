<?php
declare(strict_types=1);

namespace App\L_10_02_24\V3;

class CDProduct extends Product
{
    public function __construct(
        readonly int $id,
        readonly string $title,
        readonly int $quantity,
        readonly int $price,
        readonly int $discount,
        private readonly int $length,
    ) {
        parent::__construct($this->id, $this->title, $this->quantity, $this->price, $this->discount);
    }

    public function getLength(): int
    {
        return $this->length;
    }

}
