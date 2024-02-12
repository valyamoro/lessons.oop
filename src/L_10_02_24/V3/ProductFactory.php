<?php
declare(strict_types=1);

namespace App\L_10_02_24\V3;

final class ProductFactory
{
    public static function createProduct(array $data): Product
    {
        $type = $data['type'];
        unset($data['type']);

        return new ('App\L_10_02_24\V3\\' . $type . 'Product')(...$data);
    }

}
