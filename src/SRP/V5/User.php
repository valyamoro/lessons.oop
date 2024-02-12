<?php
declare(strict_types=1);

namespace App\SRP\V5;

/*
 * Сопряженность: Патологическая
 * Программный модуль оказывает влияние или зависит от внутренней реализации другого модуля.
 * Как правильно, этот тип зацепления связан с нарушением принципы сокрытия информации.
 *
 * В этом случаи User напрямую исполльзует класса DataBase для выполнения SQL-запросов.
 * Это деалет класс User тесно связан с конкретной реализацией базы данных и структуой таблицы
 * users.
 * В результат изменения в базе данных или методах доступа к ней могут потребовать
 * изменения в классе User, что делает его менее гибким и поддерживаемым.
 */
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getUserData($userId)
    {
        return $this->db->query("SELECT * FROM users WHERE id = {$userId}");
    }

    public function updateUser($userId, $newData)
    {
        return $this->db->query("UDATE users SET name '{$newData['name']}', email = '{$newData['email']}' WHERE id={$userId}");
    }

}
