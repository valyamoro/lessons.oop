<?php
declare(strict_types=1);

use App\L_18_02_24\Services\ProductMoving\ProductMovingService;
use App\L_18_02_24\Services\ProductMoving\Repositories\ProductMovingRepository;

error_reporting(-1);
\session_start();

require_once __DIR__ . '/../../../vendor/autoload.php';

$data = [
    'product_id' => 2,
    'from_warehouse_id' => 6,
    'to_warehouse_id' => 10,
    'quantity' => 1,
];

$serviceMovingProduct = new ProductMovingService(new ProductMovingRepository);
$data = $serviceMovingProduct->movingProduct($data);

if (!empty($data)) {
    die;
    $serviceLogHistoryProductMoving = new \App\L_18_02_24\Services\LogHistoryProductMoving\LogHistoryProductMovingService(new \App\L_18_02_24\Services\LogHistoryProductMoving\Repositories\LogHistoryProductMovingRepository());
    $serviceLogHistoryProductMoving->addHistoryProductData($data);
} else {
    print_r($_SESSION);
}
