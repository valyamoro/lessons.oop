<?php

namespace App\L_10_02_24\V3;

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

        $this->assertInstanceOf(BookProduct::class, $result);
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

        $this->assertInstanceOf(CDProduct::class, $result);
    }

    public function testCanCreateProducts(): void
    {
        $data = [
            [
                'type' => 'cd',
                'id' => '1',
                'title' => 'book1',
                'quantity' => '35',
                'price' => '500',
                'discount' => '350',
                'length' => '156',
            ],
            [
                'type' => 'book',
                'id' => '1',
                'title' => 'book1',
                'quantity' => '35',
                'price' => '500',
                'discount' => '350',
                'numPage' => '156',
            ],
        ];

        $data = ProductConverter::convertProducts($data);
        $result = ProductFactory::createProducts($data);
        foreach ($result as $product) {
            $this->assertInstanceOf(Product::class, $product);
        }

        foreach ($result as $product) {
            if (BookProduct::class instanceof $product) {
                $this->assertInstanceOf(BookProduct::class, $product);
            } elseif (CDProduct::class instanceof $product) {
                $this->assertInstanceOf(CDProduct::class, $product);
            }
        }
    }
}
