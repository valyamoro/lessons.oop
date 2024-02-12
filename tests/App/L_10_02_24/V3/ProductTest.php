<?php

namespace App\L_10_02_24\V3;

use App\L_10_02_24\V2\BookProduct;
use App\L_10_02_24\V2\CDProduct;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testCanCreateBook(): void
    {
        $data = [
            'type' => 'book',
            'id' => '1',
            'title' => 'book1',
            'quantity' => '35',
            'price' => '500',
            'discount' => '350',
            'numPage' => '156',
        ];

        $data = ProductConverter::convertProduct($data);
        $result = ProductFactory::createProduct($data);

        $this->assertInstanceOf(\App\L_10_02_24\V3\BookProduct::class, $result);
    }

    public function testCanCreateCD(): void
    {
        $data = [
            'type' => 'cd',
            'id' => '1',
            'title' => 'book1',
            'quantity' => '35',
            'price' => '500',
            'discount' => '350',
            'length' => '156',
        ];

        $data = ProductConverter::convertProduct($data);
        $result = ProductFactory::createProduct($data);

        $this->assertInstanceOf(\App\L_10_02_24\V3\CDProduct::class, $result);
    }

}
