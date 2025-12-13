<?php

namespace Mpietrucha\Laravel\Filterable;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Mpietrucha\Laravel\Filterable\Query\Concerns\InteractsWithContext;
use Mpietrucha\Laravel\Filterable\Query\Concerns\InteractsWithInput;
use Mpietrucha\Laravel\Filterable\Query\Contracts\QueryInterface;
use Mpietrucha\Laravel\Filterable\Query\Evaluation;
use Mpietrucha\Laravel\Filterable\Query\Group;
use Mpietrucha\Utility\Arr;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Concerns\Tappable;
use Mpietrucha\Utility\Concerns\Wrappable;
use Mpietrucha\Utility\Contracts\CreatableInterface;
use Mpietrucha\Utility\Contracts\TappableInterface;
use Mpietrucha\Utility\Contracts\WrappableInterface;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;
use Mpietrucha\Utility\Forward\Concerns\Forwardable;
use Mpietrucha\Utility\Normalizer;
use Mpietrucha\Utility\Value;

/**
 * @mixin \Illuminate\Contracts\Database\Eloquent\Builder
 *
 * @phpstan-import-type MixedArray from \Mpietrucha\Utility\Arr
 */
class Query implements CreatableInterface, QueryInterface, TappableInterface, WrappableInterface
{
    use Creatable, Forwardable, InteractsWithContext, InteractsWithInput, Tappable, Wrappable;

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

    public function and(callable $callback, ?array $arguments = null): static
    {
        $this->evaluate(__FUNCTION__, $callback, $arguments);

        return $this;
    }

    public function or(callable $callback, ?array $arguments = null): static
    {
        $this->evaluate(__FUNCTION__, $callback, $arguments);

        return $this;
    }

    public function not(callable $callback, ?array $arguments = null): static
    {
        $this->evaluate(__FUNCTION__, $callback, $arguments);

        return $this;
    }

    public function relation(string $relation, callable $callback, ?array $arguments = null): static
    {
        $this->evaluate(__FUNCTION__, $callback, $arguments, Arr::wrap($relation));

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
        if ($this->unsupported($request)) {
            return $this;
        }

        $this->tap($configurator);

        $this->context()->request() |> $request->get(...) |> $this->use(...);

        $this->input()->pipeThrough([
            fn (EnumerableInterface $groups) => Group::create(...) |> $groups->map(...),
            fn (EnumerableInterface $groups) => $groups->each->apply(...) |> $this->and(...),
        ]);

        return $this;
    }

    /**
     * @param  null|MixedArray  $arguments
     * @param  null|MixedArray  $parameters
     */
    protected function evaluate(string $method, callable $callback, ?array $arguments = null, ?array $parameters = null): void
    {
        $forward = Evaluation::class |> $this->forward(...);

        $parameters = Arr::flatten([
            Normalizer::array($parameters),
            $this,
            $callback,
        ]);

        $forward->eval($method, $parameters)->eval($arguments);
    }

    protected static function validator(): mixed
    {
        return static::$validator;
    }
}
