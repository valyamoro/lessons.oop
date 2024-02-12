<?php
declare(strict_types=1);

namespace App\SRP\V4;

/*
 * Связанность: Логическая
 * Как в случайной связанности, подмодули модуля никак не взаимодействуют
 * друг с другом(либо взаимодействуют слабо), однако наблюдается их
 * логическое сходство(Например, по сходству решаемых подмодулями задач).
 *
 * Все методы этого класса имеют одного общее свойство - все они выполняют
 * поиск некоторой сущности хотя каждый метод функционально принадлежит разным модулям
 *
 */
class SearchService
{
    public function searchAthlete(SearchCriteria $criteria)
    {}
    public function searchUser(SearchCriteria $criteria)
    {}
    public function searchAssociation(SearchCriteria $criteria)
    {}
    public function searchOrganization(SearchCriteria $criteria)
    {}
    public function searchClub(SearchCriteria $criteria)
    {}
    public function searchTeam(SearchCriteria $criteria)
    {}
    public function searchGame(SearchCriteria $criteria)
    {}

}
