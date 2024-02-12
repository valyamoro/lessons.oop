<?php
declare(strict_types=1);

namespace App\SRP\V4;

/*
 * Связанность: Функциональная
 * Все подмодули модуля функционально связаны между собой и выполняют одну хорошо
 * определенную задачу.
 *
 * Этот тип связанность прямая противоположность случайно связанности.
 */
class Lexer
{
    public function __construct(CharacterIterator $characterIterator)
    {}
    public function getTokens(): \Generator
    {}

}
