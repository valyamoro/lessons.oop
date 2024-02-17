<?php
declare(strict_types=1);

namespace App\L_10_02_24\V8;

class EmployeeModel
{
    public function __construct(
        private string $number,
        private string $name,
        private string $email,
        private Pay $pay,
        private Report $report,
        private DB $db,
    ) {
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function calculatePay(): int
    {
        return $this->pay->calculatePay();
    }

    public function reportHours(): int
    {
        return $this->report->reportHours();
    }

    public function save(): bool
    {
        return $this->db->save();
    }

}
