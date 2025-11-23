<?php

namespace Mpietrucha\Laravel\Filterable\Concerns;

use Mpietrucha\Utility\Collection;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\InteractsWithInputInterface
 *
 * @phpstan-import-type InputCollectionKey from \Mpietrucha\Laravel\Filterable\Contracts\InteractsWithInputInterface
 * @phpstan-import-type InputCollectionValue from \Mpietrucha\Laravel\Filterable\Contracts\InteractsWithInputInterface
 */
trait InteractsWithInput
{
    protected mixed $input = null;

    public function use(mixed $input): static
    {
        $this->input = $input;

        return $this;
    }

    /**
     * @return \Mpietrucha\Utility\Collection<InputCollectionKey, InputCollectionValue>
     */
    public function input(): EnumerableInterface
    {
        $input = $this->input |> Collection::create(...);

        return $input->values();
    }
}
