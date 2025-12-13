<?php

namespace Mpietrucha\Laravel\Filterable\Query\Concerns;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Query\Contracts\InteractsWithInputInterface
 */
trait InteractsWithInput
{
    use \Mpietrucha\Laravel\Filterable\Field\Concerns\InteractsWithInput;

    public function __construct(mixed $input, protected int $index)
    {
        $this->use($input);
    }

    public function index(): int
    {
        return $this->index;
    }
}
