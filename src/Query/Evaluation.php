<?php

namespace Mpietrucha\Laravel\Filterable\Query;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Query;
use Mpietrucha\Utility\Collection;
use Mpietrucha\Utility\Concerns\Compatible;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Contracts\CompatibleInterface;
use Mpietrucha\Utility\Contracts\CreatableInterface;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;
use Mpietrucha\Utility\Forward\Concerns\Bridgeable;
use Mpietrucha\Utility\Value;
use Mpietrucha\Utility\Value\Contracts\EvaluationInterface;

/**
 * @phpstan-type ArgumentsCollection \Mpietrucha\Utility\Collection<array-key, mixed>
 */
class Evaluation implements CompatibleInterface, CreatableInterface
{
    use Bridgeable, Compatible, Creatable;

    protected function __construct(protected mixed $handler, protected mixed $callback)
    {
    }

    /**
     * @param  ArgumentsCollection  $arguments
     */
    public function __invoke(EnumerableInterface $arguments, mixed $input): void
    {
        if (static::incompatible($input)) {
            return;
        }

        $query = Query::wrap($input);

        $arguments->prepend($query)->all() |> $this->callback()->eval(...);
    }

    public static function and(Builder $query, callable $callback): EvaluationInterface
    {
        $handler = $query->where(...);

        return static::build($handler, $callback);
    }

    public static function or(Builder $query, callable $callback): EvaluationInterface
    {
        $handler = $query->orWhere(...);

        return static::build($handler, $callback);
    }

    public static function not(Builder $query, callable $callback): EvaluationInterface
    {
        $handler = $query->whereNot(...);

        return static::build($handler, $callback);
    }

    public static function relation(string $relation, Builder $query, callable $callback): EvaluationInterface
    {
        $handler = $query->whereRelation(...);

        return static::build(Value::pipe($relation, $handler), $callback);
    }

    protected function handler(): EvaluationInterface
    {
        return $this->handler |> Value::for(...);
    }

    protected function callback(): EvaluationInterface
    {
        return $this->callback |> Value::for(...);
    }

    protected static function build(callable $handler, callable $callback): EvaluationInterface
    {
        $evaluation = static::create($handler, $callback);

        $decorator = static::decorate(...);

        return Value::pipe($evaluation, $decorator);
    }

    protected static function decorate(): void
    {
        $arguments = func_get_args() |> Collection::create(...);

        $evaluation = $arguments->shift();

        Value::pipe($arguments, $evaluation)->get(...) |> $evaluation->handler()->get(...);
    }

    protected static function compatibility(mixed $input): bool
    {
        return $input instanceof Builder;
    }
}
