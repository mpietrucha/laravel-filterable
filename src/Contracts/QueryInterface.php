<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Mpietrucha\Laravel\Filterable\Query\Contracts\InteractsWithContextInterface;

interface QueryInterface extends Builder, InteractsWithContextInterface, InteractsWithInputInterface
{
    public function and(callable $callback): static;

    public function or(callable $callback): static;

    public function relation(string $relation, callable $callback): static;

    public function adapter(): Builder;

    public function apply(Request $request, ?callable $configurator = null): static;
}
