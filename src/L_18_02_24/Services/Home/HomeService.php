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
                    $string .= ($historyMove['description'] . '<br>');
                }
            }

            if (!empty($string)) {
                $result[] = ['product_id' => $value['id'], 'description' => $string];
            }
        }

        return $this->deleteDuplicates($result, 'product_id');
    }

    public function getAllProducts(): array
    {
        return $this->repository->getAllProducts();
    }

    public function getWarehouses(): array
    {
        return $this->repository->getWareHouses();
    }

    private function deleteDuplicates(array $data, string $key): array
    {
        $uniqueIds = [];

        return \array_filter($data, function($item) use (&$uniqueIds, $key) {
            if (!\in_array($item[$key], $uniqueIds)) {
                $uniqueIds[] = $item[$key];
                return true;
            }

            return false;
        });
    }

}
