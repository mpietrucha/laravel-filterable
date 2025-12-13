<?php

namespace Mpietrucha\Laravel\Filterable\Field\Concerns;

use Mpietrucha\Utility\Collection;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Field\Contracts\InteractsWithInputInterface
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
