<?php
declare(strict_types=1);

namespace App\SRP\V5\V1;

/*
 * Сопряжение: По общей области данных.
 * Два или более модулей совместно используют общую область данных
 * (Глобальную по отношению к модулям).
 */
class Bot implements Player
{
    public function move()
    {
        global $board;

        if ($board[$x][$y] === $this->shape['o']) {

        }

        $board[$x][$x] = $this->shape['x'];
    }

}