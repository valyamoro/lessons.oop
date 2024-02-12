<?php
declare(strict_types=1);

namespace App\SRP\V5;

/*
 * Сопряженность: По управлению.
 * Один модуль взаимодействует с другим модулем с целью повлияет на его поведение
 * путем передачи ему управляющий информации.
 */
class SortedCollection
{
    private $items;
    private $compatator;

    public function __construct(array $items, callable $comparator)
    {
        $this->items = $items;
        $this->compatator = $comparator;
    }

    public function items(): array
    {
        $this->sort();
        return $this->items;
    }

    private function sort(): void
    {
        usort($this->items, $this->compatator);
    }

}

$collection = new SortedCollection([3, 5, 2, 1], function (int $a, int $b) {
    return $a <=> $b;
});

$sortedItems = $collection->items();
