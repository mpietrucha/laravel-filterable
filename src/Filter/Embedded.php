<?php

namespace Mpietrucha\Laravel\Filterable\Filter;

use Illuminate\Contracts\Database\Query\Builder;
use Mpietrucha\Laravel\Filterable\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Field;
use Mpietrucha\Laravel\Filterable\Storage;
use Mpietrucha\Laravel\Package\Translations\Concerns\InteractsWithTranslations;
use Mpietrucha\Utility\Value;

abstract class Embedded extends Field implements FilterInterface
{
    use InteractsWithTranslations;

    public function __construct()
    {
        $identifier = static::identify($this);

        $this->field(static::__("filter.$identifier"), $identifier, true);
    }

    public function handler(): mixed
    {
        return null;
    }

    public function apply(Builder $query, string $property, mixed $value): void
    {
        $evaluation = $this->handler() |> Value::for(...);

        match (true) { /** @phpstan-ignore match.unhandled */
            $evaluation->supported() => $evaluation->eval($query, $property, $value),
            $evaluation->unsupported() => $query->where($property, $this->attribute(), $value)
        };
    }

    public function negate(Builder $query, string $property, mixed $value, ?callable $handler = null): void
    {
        Negation::create($handler ?? $this->apply(...), [
            $property,
            $value,
        ]) |> $query->whereNot(...);
    }

    public function jsonSerialize(): array
    {
        return [
            'dependant' => $this->dependant(),
            'identity' => Storage::store($this),
        ] |> parent::jsonSerialize(...);
    }
}
