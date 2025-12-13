<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Preset;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Attribute;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Preset;
use Mpietrucha\Utility\Enums\Contracts\InteractsWithEnumInterface;
use Mpietrucha\Utility\Instance\Method;

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
        $input = $this->input();

        $value = match (true) {
            Method::exists($input, 'filter') => $input->filter(),
            default => $input->value()
        };

        $query->where($property, $value);
    }

    protected function input(): InteractsWithEnumInterface
    {
        return $this->input;
    }
}
