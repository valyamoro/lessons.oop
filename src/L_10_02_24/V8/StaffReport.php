<?php
declare(strict_types=1);

namespace App\L_10_02_24\V8;

class StaffReport implements Report
{
    public function reportHours(): int
    {
        $calculate = new CalculateStaff();
        return $calculate->calculateSomething();
    }

}
