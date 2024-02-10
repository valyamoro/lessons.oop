<?php
declare(strict_types=1);

namespace App\L_10_02_24\V1;

class ProductCalculate
{
    public function calculateTotalSum(array $products): array
    {
        $sum = 0;
        $result = [];

        foreach ($products as $key => $product) {
            $sum += $product->getPrice() * $product->getQuantity();
            $result[$key] = $sum;
        }

        return $result;
    }

}
