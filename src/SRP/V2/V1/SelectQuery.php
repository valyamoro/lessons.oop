<?php
declare(strict_types=1);

namespace App\SRP\V2\V1;

/*
 * Этот класс умееть строить SELECT запрос и выполнять его
 *
 * У класса есть две группы методов, методы для генерации SQL кода
 * и методы для выполнения этого кода.
 *
 * Это значит что у нас могут появиться две разные причины для изменения этого класса.
 * К примеру если мы хотим добавить метод для генерации SQL кода, то это никак не затронет
 * методы выполняющие запрос.
 */

class SelectQuery
{
    public function __construct(QueryExecutor $executor)
    {}

    public function select($column, $alias = null): self
    {}
    public function from($table, $alias = null): self
    {}
    public function join(string $type, $table, $conditions = null): self
    {}
    public function where($column, $operator = null, $value = null): self
    {}
    public function orderBy($column, $order = null): self
    {}
    public function groupBy($column, $order = null): self
    {}
    public function limit(?int $limit): self
    {}
    public function offset(?int $offset): self
    {}
    public function build(): string
    {}

    public function rows(): array
    {}
    public function row(): array
    {}
    public function column(): array
    {}
    public function scalar(): array
    {}
    public function count(): array
    {}

}