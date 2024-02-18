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
                if ($this->repository->isExistsWareHouseWithProduct($model->getId(), $model->getIdWareHouse())) {
                    $isAdd = false;
                    $quantityNowWareHouse = $this->repository->getQuantityNowWareHouse($data['product_id'], $data['to_warehouse_id']);
                    $currentQuantity = $quantityNowWareHouse + $data['quantity'];
                } else {
                    $isAdd = true;
                    $currentQuantity = $quantityPastWareHouse - $data['quantity'];
                }

                $result['product_title'] = $productData['title'];
                $result['now_warehouse_id'] = $productData['warehouse_id'];
                $result['past_warehouse_id'] = $data['from_warehouse_id'];
                $result['past_quantity_now_warehouse'] = $quantityNowWareHouse;
                $result['past_quantity_past_warehouse'] = $data['quantity'];
                $result['now_quantity_past_warehouse'] = $quantityPastWareHouse - $data['quantity'];
                $result['now_quantity_now_warehouse'] = $currentQuantity;
                $result['now_quantity'] = $currentQuantity;
                $result['moving_quantity'] = $model->getQuantity();

                if ($currentQuantity < 0) {
                    $_SESSION['errors']['quantity'] = 'На складе нет этого товара с таким количеством!' . "\n";
                } else {
                    if (!$isAdd) {
                        $this->repository->updateProduct($currentQuantity, $model->getId(), $data['to_warehouse_id']);
                        $this->repository->deleteProduct($model->getId(), $data['from_warehouse_id']);
                    } else {
                        if ($currentQuantity === 0) {
                            $this->repository->deleteProduct($model->getId(), $data['from_warehouse_id']);
                        }

                        $this->repository->addProduct($model);
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
