<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use JsonSerializable;
use Mpietrucha\Utility\Contracts\CreatableInterface;

interface FieldInterface extends CreatableInterface, JsonSerializable
{
    public static function identify(object|string $input): string;

    public function field(string $name, ?string $attribute = null, bool $hydrate = false): static;

    public function name(): string;

    public function attribute(): string;

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array;
}
