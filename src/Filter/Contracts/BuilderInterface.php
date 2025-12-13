<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Contracts;

use Mpietrucha\Utility\Contracts\ArrayableInterface;

/**
 * @extends \Mpietrucha\Utility\Contracts\ArrayableInterface<int, mixed>
 */
interface BuilderInterface extends ArrayableInterface
{
    public static function name(string $name): static;

    /**
     * @return array{0: string, 1: null|string, 2: mixed, 3: null|string}
     */
    public function toArray(): array;

    public function attribute(string $attribute): static;

    public function handler(mixed $handler): static;

    public function dependant(string $dependant): static;

    public function independent(): static;

    public function build(): FilterInterface;
}
