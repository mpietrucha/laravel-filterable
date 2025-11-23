<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

/**
 * @phpstan-type InputCollectionKey int
 * @phpstan-type InputCollectionValue mixed
 */
interface InteractsWithInputInterface
{
    public function use(mixed $input): static;

    /**
     * @return \Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface<InputCollectionKey, InputCollectionValue>
     */
    public function input(): EnumerableInterface;
}
