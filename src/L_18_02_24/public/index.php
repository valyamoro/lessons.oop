<?php
declare(strict_types=1);
error_reporting(-1);
\session_start();

require_once __DIR__ . '/../../../vendor/autoload.php';

$data = [
    'product_id' => 1,
    'from_warehouse_id' => 1,
    'to_warehouse_id' => 2,
    'quantity' => 25,
];

$serviceMovingProduct = new App\L_18_02_24\Services\ProductMoving\ProductMovingService(new App\L_18_02_24\Services\ProductMoving\Repositories\ProductMovingRepository);
$data = $serviceMovingProduct->movingProduct($data);

if (!empty($data)) {
    $serviceLogHistoryProductMoving = new \App\L_18_02_24\Services\LogHistoryProductMoving\LogHistoryProductMovingService(new \App\L_18_02_24\Services\LogHistoryProductMoving\Repositories\LogHistoryProductMovingRepository());
    $serviceLogHistoryProductMoving->addHistoryProductData($data);
} else {
    print_r($_SESSION);
}
