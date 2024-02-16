<?php
declare(strict_types=1);

namespace App\SRP\V8;

class EmployeeService
{
    private readonly EmployeeModel $model;

    public function __construct()
    {
    }

    public function make(string $type, array $data): void
    {
        $this->model = EmployeeFactory::factory($type, $data);
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
