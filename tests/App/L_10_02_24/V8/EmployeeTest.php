<?php

namespace App\L_10_02_24\V8;

use App\SRP\V8\EmployeeController;
use App\SRP\V8\EmployeeFactory;
use App\SRP\V8\EmployeeService;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    public function testCanCreateEmployee(): void
    {
        $service = new EmployeeService();
        $controller = new EmployeeController($service);

        $type = 'staff';
        $data = [
            'number' => '022HX',
            'name' => 'Ivan',
            'email' => 'ivan@gmail.com',
        ];

        $result = $controller->getResult($type, $data);

        $this->assertSame(678, $result['pay']);
        $this->assertSame(456, $result['report']);
        $this->assertSame(true, $result['db']);
    }

}
