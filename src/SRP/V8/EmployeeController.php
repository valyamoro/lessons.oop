<?php
declare(strict_types=1);

namespace App\SRP\V8;

class EmployeeController
{
    public function __construct(
        private readonly EmployeeService $service,
    ) {
    }

    public function getResult(): array
    {
        $result['pay'] = $this->service->calculatePay();
        $result['report'] = $this->service->reportHours();
        $result['db'] = $this->service->save();

        return $result;
    }

}
