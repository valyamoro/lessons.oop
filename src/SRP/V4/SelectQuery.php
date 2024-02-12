<?php
declare(strict_types=1);

namespace App\SRP\V4;
/*
 * Связанность: Коммуникационная/информационная
 * Подмодули модуля функционально связаны между собой и обрабатывают одни и те же данные.
 * Порядок обращения к подмодулям не имеет значения.
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
