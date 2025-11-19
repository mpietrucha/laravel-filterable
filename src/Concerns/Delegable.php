<?php

namespace Mpietrucha\Laravel\Filterable\Concerns;

use Mpietrucha\Utility\Forward\Concerns\Bridgeable;
use Mpietrucha\Utility\Instance;
use Mpietrucha\Utility\Instance\Path;
use Mpietrucha\Utility\Str;

/**
 * @internal
 */
trait Delegable
{
    use Bridgeable;

    /**
     * @template TValue of object
     *
     * @param  array<array-key, mixed>  $arguments
     * @param  TValue|class-string<TValue>  $instance
     * @return TValue
     */
    protected static function delegate(string $namespace, string $method, array $arguments, object|string $instance, ?string $delegator = null): ?object
    {
        $value = Path::join($namespace, Str::studly($method));

        if (Instance::not($value, $instance)) {
            return null;
        }

        return static::bridge($value)->eval($delegator ?? 'create', $arguments);
    }
}
