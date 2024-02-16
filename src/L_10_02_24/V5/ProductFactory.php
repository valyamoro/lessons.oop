<?php
declare(strict_types=1);

namespace App\L_10_02_24\V5;

use App\L_10_02_24\V1\BookProduct;
use App\L_10_02_24\V1\CDProduct;
use App\L_10_02_24\V1\Product;

class ProductFactory
{
    public function factory(array $array): Product
    {
        return match ($array['type']) {
            PRODUCT_TYPE::TYPE_BOOK => new BookProduct(...$array),
            PRODUCT_TYPE::TYPE_CD => new CDProduct(...$array),
        };
    }
}