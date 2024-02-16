<?php
declare(strict_types=1);

namespace App\SRP\V8;

class EmployeeService
{
    public function __construct(
        private readonly EmployeeModel $model,
    ) {
    }

    public function calculatePay(): int
    {
        return $this->model->calculatePay();
    }

    public function reportHours(): int
    {
        return $this->model->reportHours();
    }

    public function save(): bool
    {
        return $this->model->save();
    }

}
