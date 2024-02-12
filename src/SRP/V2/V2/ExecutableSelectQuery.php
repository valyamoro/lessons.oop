<?php

namespace App\SRP\V2\V2;

class ExecutableSelectQuery extends SelectQuery
{
    public function __construct(QueryExecutor $executor)
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
