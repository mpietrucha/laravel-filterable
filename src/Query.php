<?php

namespace Mpietrucha\Laravel\Filterable;

use Closure;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Mpietrucha\Laravel\Filterable\Concerns\InteractsWithInput;
use Mpietrucha\Laravel\Filterable\Contracts\QueryInterface;
use Mpietrucha\Laravel\Filterable\Query\Concerns\InteractsWithContext;
use Mpietrucha\Laravel\Filterable\Query\Group;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Concerns\Tappable;
use Mpietrucha\Utility\Contracts\CreatableInterface;
use Mpietrucha\Utility\Contracts\TappableInterface;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;
use Mpietrucha\Utility\Value;

/**
 * @mixin \Illuminate\Contracts\Database\Query\Builder
 */
class Query implements CreatableInterface, QueryInterface, TappableInterface
{
    use Creatable, InteractsWithContext, InteractsWithInput, Tappable;

    public function __construct(protected Builder $adapter)
    {
    }

    public function adapter(): Builder
    {
        return $this->adapter;
    }

    public function and(): static
    {
        return $this->where(...) |> $this->next(...);
    }

    public function or(): static
    {
        return $this->orWhere(...) |> $this->next(...);
    }

    public function apply(Request $request, ?callable $configurator = null): static
    {
        $this->tap($configurator);

        $this->context()->request() |> $request->get(...) |> $this->use(...);

        $this->input()->pipeThrough([
            fn (EnumerableInterface $groups) => Group::create(...) |> $groups->map(...),
            fn (EnumerableInterface $groups) => $this->and() |> $groups->each->apply(...),
        ]);

        return $this;
    }

    protected function next(Closure $query): static
    {
        return Value::identity(...) |> Value::for($query)->get(...) |> static::create(...);
    }
}
