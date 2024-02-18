<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services\LogHistoryProductMoving\Repositories;

use App\L_18_02_24\Services\BaseRepository;

class LogHistoryProductMovingRepository extends BaseRepository
{
    public function getProductIdByTitle(string $data): int
    {
        $query = 'select id from products where title=?';

        $this->connection->prepare($query)->execute([$data]);

        return (int)$this->connection->fetch()['id'];
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
