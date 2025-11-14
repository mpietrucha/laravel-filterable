<?php

namespace Mpietrucha\Laravel\Filterable\Concerns;

use Mpietrucha\Utility\Collection;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

trait InteractsWithInput
{
    protected mixed $input = null;

    public function use(mixed $input): static
    {
        $this->input = $input;

        return $this;
    }

    /**
     * @return \Mpietrucha\Utility\Collection<int, mixed>
     */
    public function input(): EnumerableInterface
    {
        $input = $this->input |> Collection::create(...);

        return $input->values();
    }
}
