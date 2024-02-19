<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services\Home;

use App\L_18_02_24\Services\BaseService;

class HomeService extends BaseService
{
    public function getHistoryMovingProducts(): array
    {
        $result = [];

        $historyMoves = $this->repository->getAllHistoryMovingProducts();

        foreach ($this->repository->getAllProducts() as $value) {
            $string = '';
            foreach ($historyMoves as $historyMove) {
                if ($value['id'] === $historyMove['product_id']) {
                    $string .= ($historyMove['description'] . "\n");
                }
            }

            if (!empty($string)) {
                $result[] = ['product_id' => $value['id'], 'description' => $string];
            }
        }

        $uniqueIds = [];

        return \array_filter($result, function($item) use (&$uniqueIds) {
            if (!\in_array($item['product_id'], $uniqueIds)) {
                $uniqueIds[] = $item['product_id'];
                return true;
            }

            return false;
        });
    }

    public function getAllProducts(): array
    {
        return $this->repository->getAllProducts();
    }

    public function getWarehouses(): array
    {
        return $this->repository->getWareHouses();
    }

}
