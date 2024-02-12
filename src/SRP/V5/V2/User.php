<?php
declare(strict_types=1);

namespace App\SRP\V5\V2;

/*
 * Сопряженность: Смешанная
 * Различные подмножества значений некоторого элемента данных используются в нескольких
 * программных модулях для разных и несвязанных целей.
 */
class User
{
    private $emailService;

    public function __construct()
    {
        $this->emailService = new EmailService();
    }

    public function register($email, $password)
    {
        $this->emailService->sendEmail($email, 'Регистрация прошла успешно');
    }

}
