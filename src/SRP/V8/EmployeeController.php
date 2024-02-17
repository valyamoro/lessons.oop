<?php
declare(strict_types=1);

namespace App\SRP\V8;

class EmployeeController
{
    public function __construct(
        private readonly EmployeeService $service,
    ) {
    }

    public function getResult(string $type, array $data): array
    {
        return $this->service->getSomething($type, $data);
    }

}
