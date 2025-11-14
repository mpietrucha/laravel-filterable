<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

interface InteractsWithInputInterface
{
    public function use(mixed $input): static;

    /**
     * @return \Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface<int, mixed>
     */
    public function input(): EnumerableInterface;
}
