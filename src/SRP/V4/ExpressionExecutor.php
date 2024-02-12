<?php
declare(strict_types=1);

namespace App\SRP\V4;

use Iterator;
use PhpParser\Lexer;

/*
 * Связанность: Последовательностная
 * Подмодули модуля функционально связаны между собой.
 * При этом входные данные одного подмодуля становятся входными данные друого подмодуля.
 * Т.е важен порядок обращение к подмодулям.
 *
 * Как правило такой модуль имеет одну точку входа.
 */
class ExpressionExecutor
{
    public function execute(string $expression)
    {
        $ast = $this->parse(
            $this->lexer(
                $this->characterIterator($expression)
            )
        );

        return $ast->evaluate();
    }

    protected function parse(Lexer $lexer)
    {}
    protected function lexer(\Iterator $iterator): Lexer
    {}
    protected function characterIterator($expression): Iterator
    {}

}
