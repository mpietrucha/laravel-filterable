<?php

namespace Mpietrucha\Laravel\Filterable\Concerns;

use Mpietrucha\Laravel\Filterable\Condition;
use Mpietrucha\Laravel\Filterable\Contracts\ConditionInterface;
use Mpietrucha\Laravel\Filterable\Filter;
use Mpietrucha\Utility\Collection;
use Mpietrucha\Utility\Enum;

trait InteractsWithConditions
{
    public static function text(string $name, ?string $attribute = null): ConditionInterface
    {
        $filters = [
            Filter::is(),
            Filter::isNot(),
            Filter::in(),
            Filter::notIn(),
            Filter::contains(),
            Filter::doesntContain(),
            Filter::startsWith(),
            Filter::doesntStartWith(),
            Filter::endsWith(),
            Filter::doesntEndWith(),
            Filter::isEmpty(),
            Filter::isNotEmpty(),
        ];

        return Condition::create($name, $attribute, $filters);
    }

    public static function number(string $name, ?string $attribute = null): ConditionInterface
    {
        $filters = [
            Filter::eq(),
            Filter::ne(),
            Filter::gt(),
            Filter::gte(),
            Filter::lt(),
            Filter::lte(),
            Filter::isEmpty(),
            Filter::isNotEmpty(),
        ];

        return Condition::create($name, $attribute, $filters);
    }

    public static function enums(string $enum, string $name, ?string $attribute = null): ConditionInterface
    {
        $cases = match (true) {
            Enum::compatible($enum) => $enum::collection(),
            default => Collection::empty()
        };

        $filters = Filter::enum(...) |> $cases->map(...);

        return Condition::create($name, $attribute, $filters);
    }
}
