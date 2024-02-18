<?php
declare(strict_types=1);

namespace App\L_10_02_24\V6\V2;

class User
{
    public function __construct(
        private readonly string $username,
        private readonly string $email,
        private readonly ?string $phoneNumber,
    ) {}

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

}
