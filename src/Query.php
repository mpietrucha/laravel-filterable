<?php

namespace Mpietrucha\Laravel\Filterable;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;
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
use Mpietrucha\Utility\Forward\Concerns\Forwardable;
use Mpietrucha\Utility\Normalizer;
use Mpietrucha\Utility\Value;

/**
 * @mixin \Illuminate\Contracts\Database\Eloquent\Builder
 *
 * @phpstan-import-type MixedArray from \Mpietrucha\Utility\Arr
 */
class Query implements CreatableInterface, QueryInterface, TappableInterface
{
    use Creatable, Forwardable, InteractsWithContext, InteractsWithInput, Tappable;

    protected static mixed $validator = null;

    public function __construct(protected Builder $adapter)
    {
    }

    /**
     * @param  MixedArray  $arguments
     */
    public function __call(string $method, array $arguments): mixed
    {
        $adapter = $this->adapter();

        return $this->forward($adapter)->eval($method, $arguments);
    }

    public static function validate(callable $validator): void
    {
        static::$validator = $validator;
    }

    public function adapter(): Builder
    {
        return $this->adapter;
    }

    public function and(callable $callback): static
    {
        static::scope($callback) |> $this->where(...);

        return $this;
    }

    public function or(callable $callback): static
    {
        static::scope($callback) |> $this->orWhere(...);

        return $this;
    }

    public function relation(string $relation, callable $callback): static
    {
        $this->whereRelation($relation, static::scope($callback));

        return $this;
    }

    public function supported(Request $request): bool
    {
        $evaluation = static::validator() |> Value::for(...);

        if ($evaluation->unsupported()) {
            return true;
        }

        return $evaluation->boolean($request, $this);
    }

    final public function unsupported(Request $request): bool
    {
        return $this->supported($request) |> Normalizer::not(...);
    }

    public function apply(Request $request, ?callable $configurator = null): static
    {
        $this->tap($configurator);

        $this->context()->request() |> $request->get(...) |> $this->use(...);

        $this->input()->pipeThrough([
            fn (EnumerableInterface $groups) => Group::create(...) |> $groups->map(...),
            fn (EnumerableInterface $groups) => $groups->each->apply(...) |> $this->and(...),
        ]);

        return $this;
    }

    protected static function scope(callable $callback): Closure
    {
        $evaluation = Value::pipe($callback, static::decorate(...));

        return $evaluation->get(...);
    }

    protected static function decorate(callable $callback, Builder $adapter): mixed
    {
        $evaluation = Value::for($callback);

        return static::create($adapter) |> $evaluation->get(...);
    }

    protected static function validator(): mixed
    {
        return static::$validator;
    }
}
