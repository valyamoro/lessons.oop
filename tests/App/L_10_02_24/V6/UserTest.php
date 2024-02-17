<?php
declare(strict_types=1);

namespace App\L_10_02_24\V6;

use App\L_10_02_24\V6\V1\User;
use App\L_10_02_24\V6\V1\UserWithPhone;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testCanCreateUser(): void
    {
        $user = new User('name', 'email@gmail.com');

        $this->assertSame('name', $user->getUsername());
        $this->assertSame('email@gmail.com', $user->getEmail());
    }

    public function testCanCreateUserWithPhone(): void
    {
        $userWithPhone = new UserWithPhone('name', 'email@gmail.com', '79337238123');

        $this->assertSame('name', $userWithPhone->getUsername());
        $this->assertSame('email@gmail.com', $userWithPhone->getEmail());
        $this->assertSame('79337238123', $userWithPhone->getPhoneNumber());
    }

    public function testCanCreateOnlyUser(): void
    {
        $user = new \App\L_10_02_24\V6\V2\User('name', 'email@gmail.com', null);

        $this->assertSame('name', $user->getUsername());
        $this->assertSame('email@gmail.com', $user->getEmail());
        $this->assertSame(null, $user->getPhoneNumber());
    }

}
