<?php

namespace App\L_10_02_24\V1;

use PHPUnit\Framework\TestCase;


class ProductTest extends TestCase
{
    // тривиальный тест.
    public function testCanCreateProduct(): void
    {
        $data = [
            'id' => '1',
            'title' => 'Product 1',
            'price' => '500',
            'quantity' => '2',
        ];

        // Разработка через тестирование во время тренировки - даже если знаю что будет ошибка, то я её допускаю.
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

        $filePath = __DIR__ . '/../../../../files/product_test.txt';
        if (\file_exists($filePath)) {
            \unlink($filePath);
        }
        $this->assertFileDoesNotExist($filePath);
        $result = $product->saveFile($filePath);
        $this->assertFileExists($filePath);
        $this->assertSame("1, [10-02-2024] title: Product 1, price: 500, quantity: 2\n", $result);
    }

    public function testSaveProductToFile(): void
    {
        // Разработка через тестирование во время тренировки - даже если знаю что будет ошибка, то я её допускаю.
        $filePath = __DIR__ . '/../../../../files/product2_test.txt';
        if (\file_exists($filePath)) {
            \unlink($filePath);
        }
        $this->assertFileDoesNotExist($filePath);

        $product1 = new Product(1, 'Product 1', 500, 2);
        $product2 = new Product(2, 'Product 2', 1000, 1);

        $result1 = $product1->saveFile($filePath);
        $result2 = $product2->saveFile($filePath);
        $this->assertFileExists($filePath);
        $this->assertSame("1, [10-02-2024] title: Product 1, price: 500, quantity: 2\n", $result1);
        $this->assertSame("2, [10-02-2024] title: Product 2, price: 1000, quantity: 1\n", $result2);
    }

    public function testCalculate(): void
    {
        $product1 = new Product(1, 'Product 1', 500, 2);
        $product2 = new Product(1, 'Product 1', 500, 2);

        $data = [
            $product1,
            $product2
        ];

        $result = $product1->calculate($data);
        $this->assertSame(2000, $result);
    }

}
