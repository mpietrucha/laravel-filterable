<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Concerns;

use Mpietrucha\Laravel\Filterable\Concerns\Delegable;
use Mpietrucha\Laravel\Filterable\Handler\Contracts\HandlerInterface;
use Mpietrucha\Laravel\Filterable\Handler\Exception\HandlerException;
use Mpietrucha\Laravel\Filterable\Handler\Preset;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Handler\Contracts\InteractsWithHandlersInterface
 *
 * @phpstan-import-type MixedArray from \Mpietrucha\Utility\Arr
 */
trait InteractsWithHandlers
{
    use Delegable;

    /**
     * @param  MixedArray  $arguments
     */
    public static function __callStatic(string $method, array $arguments): HandlerInterface
    {
        return static::delegate(
            Preset::class,
            $method,
            $arguments,
            HandlerInterface::class
        ) ?? HandlerException::for($method)->throw();
    }
}
