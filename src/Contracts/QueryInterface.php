<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Mpietrucha\Laravel\Filterable\Query\Contracts\InteractsWithContextInterface;

/**
 * @mixin \Illuminate\Contracts\Database\Eloquent\Builder
 */
interface QueryInterface extends Builder, InteractsWithContextInterface, InteractsWithInputInterface
{
    public static function validate(callable $validator): void;

    public function and(callable $callback): static;

    public function or(callable $callback): static;

    public function relation(string $relation, callable $callback): static;

    public function adapter(): Builder;

    public function supported(Request $request): bool;

    public function unsupported(Request $request): bool;

    public function apply(Request $request, ?callable $configurator = null): static;
}
