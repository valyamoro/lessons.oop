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

        $productData = $this->repository->getProductData($data['product_id'], $data['from_warehouse_id']);
        if (empty($productData)) {
            $_SESSION['errors'] = 'У этого склада нет таких продуктов!' . "\n";
        } else {
            $quantityPastWareHouse = $productData['quantity']; // past_quantity_past_warehouse
            $productData['quantity'] = $data['quantity'];
            $productData['warehouse_id'] = $data['to_warehouse_id'];

            $model = new ProductModel(...($this->formatData($productData)));

            $model->validator->setRules($model->rules());
            if (false === $model->validator->validate($model)) {
                $_SESSION['errors'] = $model->validator->errors;
            } else {
                if ($data['quantity'] <= 0) {
                    $_SESSION['errors']['quantity'] = 'Количество товаров не может быть меньше или равно нулю!' . "\n";
                } else {
                    $quantityCurrentNowWareHouse = $this->repository->getQuantityWareHouse($data['product_id'], $data['to_warehouse_id']);
                    if ($this->repository->isExistsWareHouseWithProduct($model->getId(), $model->getIdWareHouse())) {
                        $isAdd = false;
                        $quantityCurrentWareHouse = $quantityCurrentNowWareHouse + $data['quantity'];
                    } else {
                        $isAdd = true;
                        $quantityCurrentWareHouse = $quantityPastWareHouse - $data['quantity'];
                    }

                    $result['product_title'] = $productData['title'];
                    $result['now_warehouse_id'] = $productData['warehouse_id'];
                    $result['past_warehouse_id'] = $data['from_warehouse_id'];
                    $result['past_quantity_now_warehouse'] = $quantityCurrentNowWareHouse;
                    $result['past_quantity_past_warehouse'] = $this->repository->getQuantityWareHouse($data['product_id'], $data['from_warehouse_id']);
                    $result['now_quantity_past_warehouse'] = $quantityPastWareHouse - $data['quantity'];
                    $result['now_quantity_now_warehouse'] = $this->repository->getQuantityWareHouse($data['product_id'], $data['from_warehouse_id']);
                    $result['now_quantity'] = $quantityCurrentWareHouse;
                    $result['moving_quantity'] = $productData['quantity'];

                    if ($quantityCurrentWareHouse < 0) {
                        $_SESSION['errors']['quantity'] = 'На складе нет этого товара с таким количеством!' . "\n";
                    } else {
                        if (!$isAdd) {
                            $this->repository->updateProduct($quantityCurrentWareHouse, $model->getId(), $data['to_warehouse_id']);
                            $this->repository->deleteProduct($model->getId(), $data['from_warehouse_id']);
                        } else {
                            if ($quantityCurrentWareHouse === 0) {
                                $this->repository->deleteProduct($model->getId(), $data['from_warehouse_id']);
                            } else {
                                $this->repository->updateProduct($quantityCurrentWareHouse, $model->getId(), $data['from_warehouse_id']);
                            }

                            $this->repository->addProduct($model);
                        }
                    }
                }
            }
        }

        return $result;
    }

    private function formatData(array $data): array
    {
        return [
            'id' => (int)$data['product_id'],
            'idWareHouse' => (int)$data['warehouse_id'],
            'title' => $data['title'],
            'price' => (int)$data['price'],
            'quantity' => (int)$data['quantity'],
        ];
    }

}
