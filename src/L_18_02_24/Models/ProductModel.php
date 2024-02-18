<?php
declare(strict_types=1);

namespace App\L_18_02_24\Models;

use App\L_18_02_24\core\Model;

class ProductModel extends Model
{
    public function __construct(
        private readonly int $id,
        private readonly int $idWareHouse,
        private readonly string $title,
        private readonly int $price,
        private readonly int $quantity,
    ) {
        parent::__construct();
    }

    public function getIdWareHouse(): int
    {
        return $this->idWareHouse;
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

    public function rules(): array
    {
        return [
            'quantity' => [$this->validator::RULE_REQUIRED, $this->validator::RULE_NUMBER],
        ];
    }

}
