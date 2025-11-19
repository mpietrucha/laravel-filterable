<?php

namespace Mpietrucha\Laravel\Filterable\Concerns;

use Mpietrucha\Laravel\Filterable\Contracts\HandlerInterface;
use Mpietrucha\Laravel\Filterable\Exception\HandlerException;
use Mpietrucha\Laravel\Filterable\Handler\Embedded;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\InteractsWithHandlersInterface
 */
trait InteractsWithHandlers
{
    use Delegable;

    /**
     * @param  array<array-key, mixed>  $arguments
     */
    public static function __callStatic(string $method, array $arguments): HandlerInterface
    {
        return static::delegate(
            Embedded::class,
            $method,
            $arguments,
            HandlerInterface::class
        ) ?? HandlerException::for($method)->throw();
    }
}
