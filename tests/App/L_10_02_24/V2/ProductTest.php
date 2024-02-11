<?php
declare(strict_types=1);

namespace App\L_10_02_24\V2;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testCanCreateBookProductAndCdProduct(): void
    {
        $data = [
            [
                'type' => 'book',
                'id' => '1',
                'title' => 'Product 1',
                'price' => '500',
                'quantity' => '2',
                'discount' => '0',
                'num_page' => '450',
                'length' => '0',
            ],
            [
                'type' => 'cd',
                'id' => '1',
                'title' => 'Product 2',
                'price' => '1000',
                'quantity' => '1',
                'discount' => '0',
                'length' => '110',
            ],
            [
                'type' => 'book',
                'id' => '1',
                'title' => 'Product 3',
                'price' => '1000',
                'quantity' => '3',
                'discount' => '10',
                'num_page' => '350',
                'length' => '0',
            ],
        ];

        $result = Product::create($data);

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
