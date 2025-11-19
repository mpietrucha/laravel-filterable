<?php

namespace Mpietrucha\Laravel\Filterable\Concerns;

use Mpietrucha\Laravel\Filterable\Condition;
use Mpietrucha\Laravel\Filterable\Filter;

trait InteractsWithConditions
{
    public static function text(string $name, ?string $attribute = null): Condition
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

    public static function number(string $name, ?string $attribute = null): Condition
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
}
