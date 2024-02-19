<?php
declare(strict_types=1);

namespace App\L_18_02_24\Models;

use App\L_18_02_24\core\Model;

class ProductModel extends Model
{
    public function __construct(
        private readonly int $productId,
        private readonly int $fromWareHouseId,
        private readonly int $toWareHouseId,
        private readonly int $quantity,
    ) {
        parent::__construct();
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getFromWareHouseId(): int
    {
        return $this->fromWareHouseId;
    }

    public function getToWareHouseId(): int
    {
        return $this->toWareHouseId;
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
