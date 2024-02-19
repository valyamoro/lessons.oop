<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services\LogHistoryProductMoving\Repositories;

use App\L_18_02_24\Services\BaseRepository;

class LogHistoryProductMovingRepository extends BaseRepository
{
    public function getProductTitleById(int $id): string
    {
        $query = 'select title from products where id=?';

        $this->connection->prepare($query)->execute([$id]);

        return $this->connection->fetch()['title'];
    }

    public function getWareHouseTitleById(int $id): string
    {
        $query = 'select name from warehouses where id=?';

        $this->connection->prepare($query)->execute([$id]);

        return $this->connection->fetch()['name'];
    }

    public function addHistoryProductMoving(int $id, string $data): bool
    {
        $query = 'insert into history_product_moving(product_id, description) values (?, ?)';

        $this->connection->prepare($query)->execute([$id, $data]);

        return (bool)$this->connection->rowCount();
    }

}
