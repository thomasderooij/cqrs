<?php

declare(strict_types=1);

namespace Thomasderooij\Cqrs\Traits;

use Thomasderooij\Cqrs\Queries\Query;

trait CanQuery
{
    protected function query(Query $query): mixed
    {
        return $query->fetch();
    }
}