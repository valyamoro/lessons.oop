<?php
declare(strict_types=1);

namespace App\L_10_02_24\V1;

use PHPUnit\Framework\TestCase;

class ProductFileHandlerTest extends TestCase
{
    public function testSaveProductToFile(): void
    {
        $filePath = __DIR__ . '/../../../../files/product2_test.txt';
        $fileHandler = new ProductFileHandler($filePath);

        if ($fileHandler->isExists()) {
            $fileHandler->remove();
        }

        $this->assertFileDoesNotExist($filePath);

        $product1 = new Product(1, 'Product 1', 500, 2);
        $product2 = new Product(2, 'Product 2', 1000, 1);

        $result1 = $fileHandler->write($product1);
        $result2 = $fileHandler->write($product2);

        $this->assertSame("1, [10-02-2024] Title: Product 1, Price: 500, Quantity: 2\n", $result1);
        $this->assertSame("2, [10-02-2024] Title: Product 2, Price: 1000, Quantity: 1\n", $result2);
    }

}
