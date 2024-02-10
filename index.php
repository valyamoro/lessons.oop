<?php
declare(strict_types=1);

use App\L_10_02_24\V1\Product;
use App\L_10_02_24\V1\ProductFileHandler;

require __DIR__ . '/vendor/autoload.php';

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


$filePath = __DIR__ . '/files/product2_test.txt';
$fileHandler = new ProductFileHandler($filePath);
if ($fileHandler->isExists()) {
    $fileHandler->remove();
}

$result = $fileHandler->write($product);
