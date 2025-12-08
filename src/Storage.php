<?php

namespace Mpietrucha\Laravel\Filterable;

use Mpietrucha\Laravel\Filterable\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Storage\Adapter;
use Mpietrucha\Laravel\Filterable\Storage\Contracts\AdapterInterface;
use Mpietrucha\Utility\Collection;
use Mpietrucha\Utility\Concerns\Compatible;
use Mpietrucha\Utility\Contracts\CompatibleInterface;
use Mpietrucha\Utility\Hash;
use Mpietrucha\Utility\Instance;
use Mpietrucha\Utility\Type;
use Mpietrucha\Utility\Utilizer\Concerns\Utilizable;
use Mpietrucha\Utility\Utilizer\Contracts\UtilizableInterface;

/**
 * @phptan-typ Filter \Mpietrucha\Laravel\Filterable\Contracts\FilterInterface
 *
 * @phpstan-type StorageCacheCollection \Mpietrucha\Utility\Collection<string, Filter>
 */
abstract class Storage implements CompatibleInterface, UtilizableInterface
{
    use Compatible, Utilizable;

    /**
     * @var null|StorageCacheCollection
     */
    protected static ?Collection $cache = null;

    public static function use(?AdapterInterface $adapter = null): void
    {
        static::utilizable($adapter);
    }

    public static function adapter(): AdapterInterface
    {
        return static::utilize();
    }

    public static function get(string $identity): ?FilterInterface
    {
        $filter = static::cache()->get($identity) ?? static::adapter()->get($identity);

        if (Type::null($filter)) {
            return null;
        }

        if (static::compatible($filter)) {
            return $filter;
        }

        $filter = Instance::unserialize($filter);

        if (static::incompatible($filter)) {
            return null;
        }

        static::cache()->put($identity, $filter);

        return $filter;
    }

    public static function store(FilterInterface $filter): string
    {
        $filter = Instance::serialize($filter);

        $identity = Hash::md5($filter);

        static::adapter()->store($identity, $filter);

        return $identity;
    }

    /**
     * @return StorageCacheCollection
     */
    protected static function cache(): Collection
    {
        return static::$cache ??= Collection::create();
    }

    protected static function hydrate(): AdapterInterface
    {
        return Adapter::create();
    }

    /**
     * @phpstan-assert-if-true Filter $filter
     */
    protected static function compatibility(mixed $filter): bool
    {
        return $filter instanceof FilterInterface;
    }
}
