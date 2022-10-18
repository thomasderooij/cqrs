<?php

declare(strict_types=1);

namespace Thomasderooij\Cqrs\Traits;

use Thomasderooij\Cqrs\Exceptions\CqrsException;

trait Transactions
{
    /**
     * @return void
     * @throws CqrsException
     */
    protected function triggerTransactionStart(): void
    {
        throw new CqrsException("No transaction start trigger has been implemented.");
    }

    /**
     * @return void
     * @throws CqrsException
     */
    protected function triggerTransactionCommit(): void
    {
        throw new CqrsException("No transaction commit trigger has been implemented");
    }

    /**
     * @return void
     * @throws CqrsException
     */
    protected function triggerTransactionRollback(): void
    {
        throw new CqrsException("No transaction rollback trigger has been implemented");
    }
}