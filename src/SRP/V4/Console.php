<?php
declare(strict_types=1);

namespace App\SRP\V4;

/*
 * Связанность: Процедурная
 * Подмодули объединены в модуль по причине их совместного использования в некоторый момент
 * времени выполнения программы. Обращение к модулям происходит в определенном порядке.
 *
 * Подмодули могут быть функционально связаны между собой.
 */
class Console
{
    public static function hasColorSupport(): bool
    {}
    public static function highLight(string $text): string
    {}

}

$consoleText = '...';
if (Console::hasColorSupport()) {
    $consoleText = Console::highLight($consoleText);
}

$this->write($consoleText);