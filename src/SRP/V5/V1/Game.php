<?php

namespace App\SRP\V5\V1;

class Game
{
    private $player1;
    private $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function next(): bool
    {
        $this->player1->move();
        if ($this->isGameOver()) {
            return true;
        }

        $this->player2->move();
        if ($this->isGameOver()) {
            return true;
        }

        return false;
    }

    public function isGameOver(): bool
    {
        global $board;
        if ($board[$x][$y] === 'x') {
            return true;
        }

        return false;
    }
}