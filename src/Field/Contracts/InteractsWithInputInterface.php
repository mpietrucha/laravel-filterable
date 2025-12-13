<?php

namespace Mpietrucha\Laravel\Filterable\Field\Contracts;

use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

/**
 * @phpstan-type InputCollection \Mpietrucha\Utility\Collection<array-key, mixed>
 */
interface InteractsWithInputInterface
{
    public function use(mixed $input): static;

    /**
     * @return InputCollection
     */
    public function input(): EnumerableInterface;
}
