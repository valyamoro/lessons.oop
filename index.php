<?php
declare(strict_types=1);

use App\L_10_02_24\V3\ProductConverter;
use App\L_10_02_24\V3\ProductFactory;

\error_reporting(-1);

require __DIR__ . '/vendor/autoload.php';

$data = [
    'type' => 'cd',
    'id' => '1',
    'title' => 'cd',
    'quantity' => '35',
    'price' => '500',
    'discount' => '350',
    'length' => '156',
];

try {
    $data = ProductConverter::convertProduct($data);
    $result = ProductFactory::createProduct($data);
    print_r($result);
} catch (\Exception $e) {
    echo $e->getMessage();
    die;
}


