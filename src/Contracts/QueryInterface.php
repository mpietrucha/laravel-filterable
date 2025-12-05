<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Mpietrucha\Laravel\Filterable\Query\Contracts\InteractsWithContextInterface;

interface QueryInterface extends Builder, InteractsWithContextInterface, InteractsWithInputInterface
{
    public function adapter(): Builder;

    public function and(): static;

    public function or(): static;

    public function apply(Request $request, ?callable $configurator = null): static;
}
