<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

/**
 * @phpstan-type InputCollection \Mpietrucha\Utility\Collection<int, mixed>
 */
interface InteractsWithInputInterface
{
    public function use(mixed $input): static;

    /**
     * @return InputCollection
     */
    public function input(): EnumerableInterface;
}
