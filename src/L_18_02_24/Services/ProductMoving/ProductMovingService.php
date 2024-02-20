<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services\ProductMoving;

use App\L_18_02_24\Models\ProductModel;
use App\L_18_02_24\Services\BaseService;

class ProductMovingService extends BaseService
{
    public function movingProduct(array $data): array
    {
        if ($data['moving_quantity'] <= 0) {
            $_SESSION['errors'] = 'Количество товаров не может быть меньше или равно нулю!' . "\n";
            \header('Location: /src/L_18_02_24/public/');
            die;
        } else {
            $fromWareHouseProductData = $this->repository->getProductData((int)$data['product_id'],
                (int)$data['from_warehouse_id']);
            $toWareHouseProductData = $this->repository->getProductData((int)$data['product_id'],
                (int)$data['to_warehouse_id']);
            if (\is_null($toWareHouseProductData)) {
                $isAdd = true;
                $quantityProductFromWareHouse = $this->repository->getQuantityWareHousesProduct((int)$data['product_id'],
                    (int)$data['from_warehouse_id']);
                $quantityCurrentWareHouse = $quantityProductFromWareHouse - $data['moving_quantity'];
            } else {
                $isAdd = false;
                $quantityProductToWareHouse = $this->repository->getQuantityWareHousesProduct((int)$data['product_id'],
                    (int)$data['to_warehouse_id']);
                $quantityCurrentWareHouse = $quantityProductToWareHouse + $data['moving_quantity'];
            }

            if ($quantityCurrentWareHouse < 0) {
                $_SESSION['errors'] = 'На складе нет этого товара с таким количеством!' . "\n";
                \header('Location: /src/L_18_02_24/public/');
                die;
            } else {
                if (false === $isAdd) {
                    $this->repository->updateProduct($quantityCurrentWareHouse, $data['product_id'],
                        $data['to_warehouse_id']);
                    $this->repository->deleteProduct($data['product_id'], $data['from_warehouse_id']);
                } else {
                    if ($quantityCurrentWareHouse === 0) {
                        $this->repository->deleteProduct($data['product_id'], $data['from_warehouse_id']);
                    } else {
                        $this->repository->updateProduct($quantityCurrentWareHouse, $data['product_id'],
                            $data['from_warehouse_id']);
                    }

                    $this->repository->addProduct($data['product_id'], $data['to_warehouse_id'],
                        $data['moving_quantity']);
                }
            }
        }

        return [
            'from_warehouse_past_quantity' => $fromWareHouseProductData['quantity'],
            'to_warehouse_past_quantity' => $toWareHouseProductData['quantity'] ?? 0,
        ];
    }

}
