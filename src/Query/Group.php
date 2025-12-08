<?php

namespace Mpietrucha\Laravel\Filterable\Query;

use Closure;
use Mpietrucha\Laravel\Filterable\Contracts\QueryInterface;
use Mpietrucha\Laravel\Filterable\Query\Concerns\InteractsWithInput;
use Mpietrucha\Laravel\Filterable\Query\Contracts\GroupInterface;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Contracts\CreatableInterface;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

class Group implements CreatableInterface, GroupInterface
{
    use Creatable, InteractsWithInput;

    public function apply(QueryInterface $query): void
    {
        $this->input()->pipeThrough([
            fn (EnumerableInterface $rows) => Row::create(...) |> $rows->map(...),
            fn (EnumerableInterface $rows) => $rows->each->apply(...) |> $this->scope($query),
        ]);
    }

    protected function scope(QueryInterface $query): Closure
    {
        return match (true) {
            $this->index() === 0 => $query->and(...),
            default => $query->or(...)
        };
    }
}
