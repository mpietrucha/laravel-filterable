<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

/**
 * @phpstan-type InputKey int
 * @phpstan-type InputValue mixed
 */
interface InteractsWithInputInterface
{
    public function use(mixed $input): static;

    /**
     * @return \Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface<InputKey, InputValue>
     */
    public function input(): EnumerableInterface;
}
