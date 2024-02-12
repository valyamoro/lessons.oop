<?php
declare(strict_types=1);

namespace App\SRP\V5;

/*
 * Сопряженность: По данным.
 * Данные одного программного модуля поступают на вход другого модуля.
 */
class UserController
{
    public function userDetails(string $userId, UserQueryService $service)
    {
        return $service->getUserDetails($userId);
    }
}
