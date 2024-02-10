<?php
declare(strict_types=1);

namespace App\L_10_02_24\V1;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testCanCreateProduct(): void
    {
        $data = [
            'id' => '1',
            'title' => 'Product 1',
            'price' => '500',
            'quantity' => '2',
        ];
        $product = new Product(
            (int)$data['id'],
            $data['title'],
            (int)$data['price'],
            (int)$data['quantity'],
        );

        $this->assertSame(1, $product->getId());
        $this->assertSame('Product 1', $product->getTitle());
        $this->assertSame(500, $product->getPrice());
        $this->assertSame(2, $product->getQuantity());
        $this->assertSame('Product 1 500 2', $product->productInfo());
    }

    public function testCalculateProductTotalSum(): void
    {
        $product1 = new Product(1, 'Product 1', 500, 2);
        $product2 = new Product(2, 'Product 2', 1000, 1);

        $data = [
            'product1' => $product1,
            'product2' => $product2,
        ];

        $calculate = new ProductCalculate();
        $result = $calculate->calculateTotalSum($data);

        $this->assertSame(1000, $result['product1']);
        $this->assertSame(2000, $result['product2']);
    }

}
