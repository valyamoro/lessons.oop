<?php
declare(strict_types=1);

namespace App\L_10_02_24\V6\V1;

class User
{
    public function __construct(
        private readonly string $username,
        private readonly string $email,
    ) {
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

}
