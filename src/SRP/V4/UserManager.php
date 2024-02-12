<?php
declare(strict_types=1);

namespace App\SRP\V4;

/*
 * Связанность: Случайная
 * Подмодули модуля в этом случае никак не взаимодействуют
 * друг с другом и выполняют функционально не связанные задачи.
 */
class UserManager
{
    public function writeToFile() {}
    public function calculatePaymentAmount()
    {}
    public function authenticateUser()
    {}

}
