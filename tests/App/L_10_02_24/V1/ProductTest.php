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
        $filePath = __DIR__ . '/../../../../files/product_test.txt';
        $fileHandler = new ProductFileHandler($filePath);

        $this->assertSame(1, $product->getId());
        $this->assertSame('Product 1', $product->getTitle());
        $this->assertSame(500, $product->getPrice());
        $this->assertSame(2, $product->getQuantity());
        $this->assertSame('Product 1 500 2', $product->productInfo());

        $result = $fileHandler->write($product);

        $this->assertSame("1, [10-02-2024] Title: Product 1, Price: 500, Quantity: 2\n", $result);
    }

    public function testSaveProductToFile(): void
    {
        $filePath = __DIR__ . '/../../../../files/product2_test.txt';
        $fileHandler = new ProductFileHandler($filePath);

        $product1 = new Product(1, 'Product 1', 500, 2);
        $product2 = new Product(2, 'Product 2', 1000, 1);

        $result1 = $fileHandler->write($product1);
        $result2 = $fileHandler->write($product2);

        $this->assertSame("1, [10-02-2024] Title: Product 1, Price: 500, Quantity: 2\n", $result1);
        $this->assertSame("2, [10-02-2024] Title: Product 2, Price: 1000, Quantity: 1\n", $result2);
    }

    public function testCalculateProductTotalSum(): void
    {
        $product1 = new Product(1, 'Product 1', 500, 2);
        $product2 = new Product(2, 'Product 2', 1000, 1);

        $data = [
            $product1,
            $product2,
        ];

        $result = $product2->calculate($data);

        $this->assertSame(2000, $result);
    }

}
