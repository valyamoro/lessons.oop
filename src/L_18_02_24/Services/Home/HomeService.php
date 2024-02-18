<?php
declare(strict_types=1);

namespace App\L_18_02_24\Services\Home;

use App\L_18_02_24\Services\BaseService;

class HomeService extends BaseService
{
    public function getAll(): array
    {
        $result['products'] = $this->repository->getAllProducts();
        $result['history_moving'] = $this->repository->getAllHistoryMoving();

        return $result;
    }

}
