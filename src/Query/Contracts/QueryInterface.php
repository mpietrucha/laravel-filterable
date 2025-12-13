<?php

namespace Mpietrucha\Laravel\Filterable\Query\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * @mixin \Illuminate\Contracts\Database\Eloquent\Builder
 *
 * @phpstan-import-type MixedArray from \Mpietrucha\Utility\Arr
 */
interface QueryInterface extends Builder, InteractsWithContextInterface, InteractsWithInputInterface
{
    public static function validate(callable $validator): void;

    /**
     * @param  null|MixedArray  $arguments
     */
    public function and(callable $callback, ?array $arguments = null): static;

    /**
     * @param  null|MixedArray  $arguments
     */
    public function or(callable $callback, ?array $arguments): static;

    /**
     * @param  null|MixedArray  $arguments
     */
    public function not(callable $callback, ?array $arguments = null): static;

    /**
     * @param  null|MixedArray  $arguments
     */
    public function relation(string $relation, callable $callback, ?array $arguments = null): static;

    public function adapter(): Builder;

    public function supported(Request $request): bool;

    public function unsupported(Request $request): bool;

    public function apply(Request $request, ?callable $configurator = null): static;
}
