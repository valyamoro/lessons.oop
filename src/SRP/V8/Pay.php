<?php
declare(strict_types=1);

namespace App\SRP\V8;

interface Pay
{
    public function calculatePay(): int;
}
