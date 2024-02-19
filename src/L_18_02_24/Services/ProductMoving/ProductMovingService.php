<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services\ProductMoving;

use App\L_18_02_24\Models\ProductModel;
use App\L_18_02_24\Services\BaseService;

class ProductMovingService extends BaseService
{
    public function movingProduct(array $data): array
    {
        $result = [];
        $fromWareHouseProductData = $this->repository->getProductData((int)$data['product_id'], (int)$data['from_warehouse_id']);
        $toWareHouseProductData = $this->repository->getProductData((int)$data['product_id'], (int)$data['to_warehouse_id']);

        $quantityProductToWareHouse = $this->repository->getQuantityWareHouse($data['product_id'], $data['to_warehouse_id']);
        $quantityProductFromWareHouse = $this->repository->getQuantityWareHouse($data['product_id'], $data['from_warehouse_id']);

        if (empty($toWareHouseProductData)) {
            $isAdd = true;
            $quantityCurrentWareHouse = $quantityProductFromWareHouse - $data['quantity'];
        } else {
            $isAdd = false;
            $quantityCurrentWareHouse = $quantityProductToWareHouse + $data['quantity'];
        }

        if ($data['quantity'] <= 0) {
            $_SESSION['errors']['quantity'] = 'Количество товаров не может быть меньше или равно нулю!' . "\n";
        } else {
            if ($quantityCurrentWareHouse < 0) {
                $_SESSION['errors']['quantity'] = 'На складе нет этого товара с таким количеством!' . "\n";
            } else {
                if (false === $isAdd) {
                    $this->repository->updateProduct($quantityCurrentWareHouse, $data['product_id'], $data['to_warehouse_id']);
                    $this->repository->deleteProduct($data['product_id'], $data['from_warehouse_id']);
                } else {
                    if ($quantityCurrentWareHouse === 0) {
                        $this->repository->deleteProduct($data['product_id'], $data['from_warehouse_id']);
                    } else {
                        $this->repository->updateProduct($quantityCurrentWareHouse, $data['product_id'], $data['from_warehouse_id']);
                    }

                    $this->repository->addProduct($data['product_id'], $data['to_warehouse_id'], $data['quantity']);
                }
            }
        }

//        $result['to_warehouse_id'] = $data['to_warehouse_id'];
//        $result['from_warehouse_id'] = $data['from_warehouse_id'];
//        $result['moving_quantity'] = $productData['quantity'];
//
//
//        $result['now_quantity_past_warehouse'] = $quantityPastWareHouse - $data['quantity'];
//        $result['now_quantity_now_warehouse'] = $this->repository->getQuantityWareHouse($data['product_id'], $data['from_warehouse_id']);
//
//        $result['past_quantity_to_warehouse'] = $quantityCurrentNowWareHouse; // ?
//        $result['past_quantity_from_warehouse'] = $this->repository->getQuantityWareHouse($data['product_id'], $data['from_warehouse_id']);
//
//        $result['now_quantity'] = $quantityCurrentWareHouse;

        return $result;
    }

    private function initProductModel(array $data): ProductModel
    {
        $model = new ProductModel(...($this->formatData($data)));
        $model->validator->setRules($model->rules());
        if (false === $model->validator->validate($model)) {
            $_SESSION['errors'] = $model->validator->errors;
            die;
        }

        return $model;
    }

    private function formatData(array $data): array
    {
        return [
            'productId' => (int)$data['product_id'],
            'fromWareHouseId' => (int)$data['from_warehouse_id'],
            'toWareHouseId' => (int)$data['to_warehouse_id'],
            'quantity' => (int)$data['quantity'],
        ];
    }

}
