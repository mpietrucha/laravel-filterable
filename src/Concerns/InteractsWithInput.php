<?php

namespace Mpietrucha\Laravel\Filterable\Concerns;

use Mpietrucha\Utility\Collection;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\InteractsWithInputInterface
 */
trait InteractsWithInput
{
    protected mixed $input = null;

    public function use(mixed $input): static
    {
        $this->input = $input;

        return $this;
    }

    public function input(): EnumerableInterface
    {
        return $this->input |> Collection::bind(...);
    }
}
