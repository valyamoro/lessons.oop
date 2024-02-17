<?php
declare(strict_types=1);

namespace App\L_10_02_24\V6\V1;

class UserWithPhone extends User
{

    public function __construct(
        string $username,
        string $email,
        private readonly string $phoneNumber,
    ) {
        parent::__construct($username, $email);
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

}
