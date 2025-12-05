<?php

namespace Mpietrucha\Laravel\Filterable\Query\Contracts;

interface InteractsWithContextInterface
{
    public function filter(string $filter): static;

    public function value(string $value): static;

    public function request(string $request): static;

    public function context(): ContextInterface;
}
