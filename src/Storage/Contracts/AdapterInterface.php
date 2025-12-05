<?php

namespace Mpietrucha\Laravel\Filterable\Storage\Contracts;

interface AdapterInterface
{
    public function get(string $identity): ?string;

    public function store(string $identity, string $value): void;
}
