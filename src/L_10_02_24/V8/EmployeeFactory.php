<?php

namespace App\L_10_02_24\V8;

class EmployeeFactory
{
    public static function factory(string $type, array $data): EmployeeModel
    {
        return match ($type) {
            'accounting' => new EmployeeModel(
                $data['number'],
                $data['name'],
                $data['email'],
                new AccountingPay(),
                new AccountingReport(),
                new DbPdo(),
            ),
            'staff' => new EmployeeModel (
                $data['number'],
                $data['name'],
                $data['email'],
                new StaffPay(),
                new StaffReport(),
                new DbFile(),
            ),
        };
    }
}
