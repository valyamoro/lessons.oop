<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services\LogHistoryProductMoving;

use App\L_18_02_24\Services\BaseService;

class LogHistoryProductMovingService extends BaseService
{
    public function formatToInfoAboutMovingProduct(array $data): string
    {
        $data['past_warehouse_title'] = $this->repository->getWareHouseTitleById($data['past_warehouse_id']);
        $data['now_warehouse_title'] = $this->repository->getWareHouseTitleById($data['now_warehouse_id']);

        $string = "{$data['past_warehouse_title']} {$data['product_title']} был {$data['past_quantity_past_warehouse']} стало {$data['now_quantity_past_warehouse']}\n";

        $string .= "{$data['now_warehouse_title']} {$data['product_title']} было {$data['past_quantity_now_warehouse']} перемещено {$data['moving_quantity']} стало {$data['now_quantity']}";

        return $string;
    }

    public function addHistoryProductData(array $data): void
    {
        $result = $this->formatToInfoAboutMovingProduct($data);
        $this->repository->addHistoryProductMoving($this->repository->getProductIdByTitle($data['product_title']), $result);
    }

}
