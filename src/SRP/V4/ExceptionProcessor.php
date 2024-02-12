<?php
declare(strict_types=1);

namespace App\SRP\V4;

/*
 * Связанность: Временная
 * Подмодули объединены в модуль по причине их совместного использования
 * в некоторый момент времени выполнения программы, порядок обращения к ним не важен.
 *
 * При этом подмодули никак функционально не связаны между собой.
 */
class ExceptionProcessor
{
    public function logException(\Exception $e) {}
    public function notifyAdminAboutException(\Exception $e)
    {}
    public function showFormattedException(\Exception $e)
    {}

}

$exceptionProcessor = new ExceptionProcessor();

try {
    //...
} catch (\Exception $e) {
    $exceptionProcessor->logException($e);
    $exceptionProcessor->notifyAdminAboutException($e);
    $exceptionProcessor->showFormattedException($e);
}
