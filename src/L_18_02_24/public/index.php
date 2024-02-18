<?php
declare(strict_types=1);
error_reporting(-1);
\session_start();

require_once __DIR__ . '/../../../vendor/autoload.php';

if (!empty($_POST)) {
    $data = [
        'product_id' => 1,
        'from_warehouse_id' => 2,
        'to_warehouse_id' => 1,
        'quantity' => 1,
    ];

    $serviceMovingProduct = new App\L_18_02_24\Services\ProductMoving\ProductMovingService(new App\L_18_02_24\Services\ProductMoving\Repositories\ProductMovingRepository);
    $data = $serviceMovingProduct->movingProduct($data);

    if (!empty($data)) {
        $serviceLogHistoryProductMoving = new \App\L_18_02_24\Services\LogHistoryProductMoving\LogHistoryProductMovingService(new \App\L_18_02_24\Services\LogHistoryProductMoving\Repositories\LogHistoryProductMovingRepository());
        $serviceLogHistoryProductMoving->addHistoryProductData($data);
    }
}

$serviceHome = new App\L_18_02_24\Services\Home\HomeService(new \App\L_18_02_24\Services\Home\Repositories\HomeRepository());
$result = $serviceHome->getAll();

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
<body>

<table class="table">
    <?php ?>
    <thead>
    <tr>
        <th scope="col">Айди продукта</th>
        <th scope="col">Название продукта</th>
        <th scope="col">Название склада</th>
        <th scope="col">Количество</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result['products'] as $value): ?>
        <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['title'] ?></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['quantity']; ?> </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>



