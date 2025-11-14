<?php

namespace Mpietrucha\Laravel\Filterable\Concerns;

use Mpietrucha\Utility\Arr;
use Mpietrucha\Utility\Reflection;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\SerializableInterface
 */
trait Serializable
{
    public function serialize(array $data): array
    {
        $previous = match (true) { /** @phpstan-ignore-next-line class.noParent */
            Reflection::create($this)->getParentClass() => parent::jsonSerialize(),
            default => []
        };

        return [$previous, $data] |> Arr::flatten(...);
    }
}
