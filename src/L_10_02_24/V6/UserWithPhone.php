<?php
declare(strict_types=1);

namespace App\L_10_02_24\V6;

class UserWithPhone extends User
{

    public function __construct(
        string $username,
        string $email,
        private readonly string $phone,
    ) {
        parent::__construct($username, $email);
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

}
