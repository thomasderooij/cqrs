<?php

declare(strict_types=1);

namespace Thomasderooij\Cqrs\Queries;

use Thomasderooij\Cqrs\Cqrs;
use Thomasderooij\Cqrs\Traits\CanQuery;
use Thomasderooij\Cqrs\Traits\Transactions;
use Throwable;

abstract class Query extends Cqrs
{
    use CanQuery, Transactions;

    protected bool $transaction = false;

    public function fetch(): mixed
    {
        if (!$this->isSatisfied()) {
            throw $this->exception();
        }

        if ($this->transaction) $this->triggerTransactionStart();

        try {
            $result = $this->run();
            if ($this->transaction) $this->triggerTransactionCommit();

            return $result;
        } catch (Throwable $e) {
            if ($this->transaction) $this->triggerTransactionRollback();
            throw $e;
        }
    }
}