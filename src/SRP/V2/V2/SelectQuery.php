<?php
declare(strict_types=1);

namespace App\SRP\V2\V2;

class SelectQuery
{
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

}
