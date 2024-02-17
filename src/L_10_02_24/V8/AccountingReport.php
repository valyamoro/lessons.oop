<?php
declare(strict_types=1);

namespace App\L_10_02_24\V8;

class AccountingReport implements Report
{
    public function reportHours(): int
    {
        $calculate = new CalculateAccounting();
        return $calculate->calculateSomething();
    }

}
