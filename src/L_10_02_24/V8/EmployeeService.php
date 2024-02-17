<?php
declare(strict_types=1);

namespace App\L_10_02_24\V8;

class EmployeeService
{
    private readonly EmployeeModel $model;

    public function __construct()
    {
    }

    public function getSomething(string $type, array $data): array
    {
        if (!empty($data)) {
            $this->make($type, $data);
        }

        $result['pay'] = $this->calculatePay();
        $result['report'] = $this->reportHours();
        $result['db'] = $this->save();

        return $result;
    }

    private function make(string $type, array $data): void
    {
        $this->model = EmployeeFactory::factory($type, $data);
    }

    private function calculatePay(): int
    {
        return $this->model->calculatePay();
    }

    private function reportHours(): int
    {
        return $this->model->reportHours();
    }

    private function save(): bool
    {
        return $this->model->save();
    }

}
