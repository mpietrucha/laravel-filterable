<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Preset;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Attribute;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Preset;
use Mpietrucha\Utility\Enums\Contracts\InteractsWithEnumInterface;

class Enum extends Preset
{
    use Attribute\Eq, Dependant\None;

    public function __construct(protected InteractsWithEnumInterface $input)
    {
    }

    public function name(): string
    {
        return $this->input()->label();
    }

    public function apply(Builder $query, string $property, mixed $value): void
    {
        $query->where($property, $this->input()->value());
    }

    protected function input(): InteractsWithEnumInterface
    {
        return $this->input;
    }
}
