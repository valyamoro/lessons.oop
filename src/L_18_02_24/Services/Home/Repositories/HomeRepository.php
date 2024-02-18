<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services\Home\Repositories;

use App\L_18_02_24\Services\BaseRepository;

class HomeRepository extends BaseRepository
{
    public function getAllProducts(): array
    {
        $query = 'select p.id, p.title, w.name, pw.quantity from product_warehouse as pw
        join products as p on pw.product_id = p.id
        join warehouses as w on pw.warehouse_id = w.id';

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
