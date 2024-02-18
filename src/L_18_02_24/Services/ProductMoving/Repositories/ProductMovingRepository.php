<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services\ProductMoving\Repositories;

use App\L_18_02_24\Models\ProductModel;
use App\L_18_02_24\Services\BaseRepository;

class ProductMovingRepository extends BaseRepository
{
    public function getQuantityNowWareHouse(int $productId, int $wareHouseId): int
    {
        $query = 'select quantity from product_warehouse where product_id=? and warehouse_id=?';

        $this->connection->prepare($query)->execute([$productId, $wareHouseId]);

        $result = $this->connection->fetch();
        return empty($result) ? 0 : $result['quantity'];
    }
    public function isExistsWareHouseWithProduct(int $productId, int $wareHouseId): bool
    {
        $query = 'select id from product_warehouse where product_id=? and warehouse_id=?';

        $this->connection->prepare($query)->execute([$productId, $wareHouseId]);

        return (bool)$this->connection->fetch();
    }

    public function updateProduct($quantity, $id, $wareHouseId): bool
    {
        $query = 'update product_warehouse set quantity=? where product_id=? and warehouse_id=?';

        $this->connection->prepare($query)->execute([
            $quantity,
            $id,
            $wareHouseId,
        ]);

        return (bool)$this->connection->rowCount();
    }

    public function deleteProduct($productId, $wareHouseId): bool
    {
        $query = 'delete from product_warehouse where product_id=? and warehouse_id=?';

        $this->connection->prepare($query)->execute([
            $productId,
            $wareHouseId,
        ]);

        return (bool)$this->connection->rowCount();
    }

    public function getById(int $id): array
    {
        $query = 'select * from product_warehouse where id=?';

        $this->connection->prepare($query)->execute([$id]);

        return $this->connection->fetch();
    }

    public function addProduct(ProductModel $model): array
    {
        $query = 'insert into product_warehouse(product_id, warehouse_id, quantity) values (?, ?, ?)';

        $this->connection->prepare($query)->execute([
            $model->getId(),
            $model->getIdWareHouse(),
            $model->getQuantity(),
        ]);

        return $this->getById($this->connection->lastInsertId());
    }

    public function getProductData(int $productId, int $wareHouseId): array
    {
        $query = 'select *, product_warehouse.quantity from product_warehouse
        join products on products.id=:product_id
        where product_id=:product_id and warehouse_id=:warehouse_id';

        $this->connection->prepare($query)->execute([
            ':product_id' => $productId,
            ':warehouse_id' => $wareHouseId,
        ]);

        return $this->connection->fetch();
    }

}
