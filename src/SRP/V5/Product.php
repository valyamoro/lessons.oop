<?php

namespace App\SRP\V5;

/*
 * Сопряженность: по содержимому
 * Часть или все содержимое одного программного модуля включены в содержимое
 * другого модуля.
 *
 * Примером такого зацепления могут служить вложенные или анонимные классы.
 *
 * Класс Product реалзиует интерфейс Displayable, что позволяет функции
 * displayItem работать с ними.
 * Такой подход позволяет создавать гибкий и универсальный код, который
 * может работать с разными типами данных, при условии что они реализуют
 * один и тот же интерфейс.
 */
class Product implements Displayable
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function display()
    {
        echo 'Product: ' . $this->name . ', Price: $' . $this->price . '<br>';
    }

}

function DisplayItem(Displayable $item)
{
    $item->display();
}

$product = new Product('Phone', 500);
displayItem($product);
