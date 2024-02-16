<?php
declare(strict_types=1);

namespace App\SRP\V8;

interface DB
{
    public function save(): bool;
}
