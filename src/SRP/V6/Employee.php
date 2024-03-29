<?php
declare(strict_types=1);

namespace App\SRP\V6;

/*
 * Этот класс нарушает принцип единственной ответственности, потому что три его метода отвечают за три разных актора.
 *
 * Поместив исходный код этих трех методов в общий класс, разработчики объединили трёх акторов, в результате
 * такого объединения действия сотрудников бухгалтерии могут затронуть что-то, что требуется сотрудникам отдела
 * по работа с персоналом.
 *
 * Это может произойти если 2 метода из этого класса используют 1 другой метод, и одному из разработчиков понадобилось
 * изменить этот метод, в таком случаи поломается второй.
 *
 * Принцип единственной ответственности требует разделять код, от которого зависят разные акторы.
 */
class Employee
{
    // Реализация этого метода определяет бухгалтерией.
    public function calculatePay() {}
    // Реализация этого метода определяется и используется отделом по работе с персоналом.
    public function reportHours() {}
    // Реализация этого метода определяется администраторами баз данных.
    public function save() {}

}