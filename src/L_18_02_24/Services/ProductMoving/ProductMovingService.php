<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services\ProductMoving;

use App\L_18_02_24\Models\ProductModel;
use App\L_18_02_24\Services\BaseService;

class ProductMovingService extends BaseService
{
    public function movingProduct(array $data): array
    {
        $fromWareHouseProductData = $this->repository->getProductData($data['product_id'], $data['from_warehouse_id']);
        $toWareHouseProductData = $this->repository->getProductData($data['product_id'], $data['to_warehouse_id']);

        $quantityProductFromWareHouse = $this->repository->getQuantityWareHousesProduct($data['product_id'], $data['from_warehouse_id']);
        $quantityProductToWareHouse = $this->repository->getQuantityWareHousesProduct($data['product_id'], $data['to_warehouse_id']);

        $quantityDifferenceCurrentWareHouse = $quantityProductFromWareHouse - $data['moving_quantity'];
        $quantitySumCurrentWareHouse = $quantityProductToWareHouse + $data['moving_quantity'];

        if (\is_null($toWareHouseProductData)) {
            $isAdd = true;
            $quantityCurrentWareHouse = $quantityDifferenceCurrentWareHouse;
        } else {
            $isAdd = false;
            $quantityCurrentWareHouse = $quantitySumCurrentWareHouse;
        }

        if (false === $isAdd) {
            if ($quantityProductFromWareHouse <= $data['moving_quantity']) {
                $this->repository->deleteProduct($data['product_id'], $data['from_warehouse_id']);
            } else {
                $this->repository->updateProduct($quantityDifferenceCurrentWareHouse, $data['product_id'], $data['from_warehouse_id']);
                $this->repository->updateProduct($quantitySumCurrentWareHouse, $data['product_id'], $data['to_warehouse_id']);
            }
        } else {
            if ($quantityCurrentWareHouse === 0) {
                $this->repository->deleteProduct($data['product_id'], $data['from_warehouse_id']);
            } else {
                $this->repository->updateProduct($quantityCurrentWareHouse, $data['product_id'], $data['from_warehouse_id']);
            }

            $this->repository->addProduct($data['product_id'], $data['to_warehouse_id'], $data['moving_quantity']);
        }


        return [
            'from_warehouse_past_quantity' => $fromWareHouseProductData['quantity'],
            'to_warehouse_past_quantity' => $toWareHouseProductData['quantity'] ?? 0,
        ];
    }

}
