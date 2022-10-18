<?php

declare(strict_types=1);

namespace Thomasderooij\Cqrs;

use Throwable;

abstract class Cqrs
{
    abstract protected function run(): mixed;
    abstract protected function isSatisfied(): bool;
    abstract protected function exception(): Throwable;
}