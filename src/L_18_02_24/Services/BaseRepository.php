<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services;

use App\L_18_02_24\Database\DatabaseConfiguration;
use App\L_18_02_24\Database\DatabasePDOConnection;
use App\L_18_02_24\Database\PDODriver;

class BaseRepository
{
    protected PDODriver $connection;
    public function __construct(
    ) {
        $this->connection = $this->connectionDB();
    }

    private function connectionDB(): PDODriver
    {
        $configuration = require __DIR__ . '/../config/db.php';

        $dataBaseConfiguration = new DatabaseConfiguration(...$configuration);
        $dataBasePDOConnection = new DatabasePDOConnection($dataBaseConfiguration);

        return new PDODriver($dataBasePDOConnection->connection());
    }

    public function getQuantityWareHouse(int $productId, int $wareHouseId): int
    {
        $query = 'select quantity from product_warehouse where product_id=? and warehouse_id=?';

        $this->connection->prepare($query)->execute([$productId, $wareHouseId]);

        $result = $this->connection->fetch();
        return empty($result) ? 0 : $result['quantity'];
    }

}
