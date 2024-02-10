<?php
declare(strict_types=1);

namespace App\L_10_02_24\V1;

class ProductCalculate
{
    public function calculateTotalSum(array $products): int
    {
        $sum = 0;

        foreach ($products as $product) {
            $sum += $product->getPrice() * $product->getQuantity();
        }

        return $sum;
    }

}
