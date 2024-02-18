<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services\Home\Repositories;

use App\L_18_02_24\Services\BaseRepository;

class HomeRepository extends BaseRepository
{
    public function getWareHouses(): array
    {
        $query = 'select * from warehouses';

        $this->connection->prepare($query)->execute();

        return $this->connection->fetchAll();
    }

    public function getAllProducts(): array
    {
        $query = 'SELECT p.id, w.id AS warehouse_id, p.title, p.price, w.name, pw.quantity 
          FROM product_warehouse AS pw
          JOIN products AS p ON pw.product_id = p.id
          JOIN warehouses AS w ON pw.warehouse_id = w.id';

        $this->connection->prepare($query)->execute();

        return $this->connection->fetchAll();
    }

    public function getAllHistoryMoving(): array
    {
        $query = 'select * from history_product_moving';

        $this->connection->prepare($query)->execute();

        return $this->connection->fetchAll();
    }

}
