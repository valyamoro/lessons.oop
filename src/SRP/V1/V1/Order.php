<?php
declare(strict_types=1);

namespace App\SRP\M1\V1;

/*

Данный класс выполняет операций для 3 различных титпов задач:
Работа с самим заказом, работа с отображением заказа, работа с хранилищем.

Если мы хотим внести изменения в методы печати или работы хранилища, то мы изменяем
сам класс заказа, что может привести к неработоспособности самого класса.

Решить эту проблему стоит разделением данного класса на 3 отдельных класса,
каждый из которых будет заниматься своей задачей.

*/
class Order
{
    public function calculateTotalSum()
    {}
    public function getItems()
    {}
    public function getItemCount()
    {}
    public function addItem($item)
    {}
    public function deleteItem($item)
    {}

    public function printOrder()
    {}
    public function showOrder()
    {}

    public function load()
    {}
    public function save()
    {}
    public function update()
    {}
    public function delete()
    {}

}



