<?php
declare(strict_types=1);

namespace App\SRP\M1\V2;

/*
 * Теперь каждый класс занимается своей конкретной задачей и для каждого класса есть
 * только одна причина для его изменения.
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
}