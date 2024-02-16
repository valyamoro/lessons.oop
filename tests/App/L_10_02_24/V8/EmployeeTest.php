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
        $type = 'staff';
        $data = [
            'number' => '022HX',
            'name' => 'Ivan',
            'email' => 'ivan@gmail.com',
        ];

        $model = EmployeeFactory::factory($type, $data);
        $service = new EmployeeService($model);
        $controller = new EmployeeController($service);

        $result = $controller->getResult();

        $this->assertSame(678, $result['pay']);
        $this->assertSame(456, $result['report']);
        $this->assertSame(true, $result['db']);
    }

}
