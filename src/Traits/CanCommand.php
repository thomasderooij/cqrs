<?php

declare(strict_types=1);

namespace Thomasderooij\Cqrs\Traits;

use Thomasderooij\Cqrs\Commands\Command;

trait CanCommand
{
    protected function command(Command $command): mixed
    {
        return $command->execute();
    }
}