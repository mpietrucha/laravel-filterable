<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use JsonSerializable;

/**
 * @phpstan-type Serializable array<string, mixed>
 */
interface SerializableInterface extends JsonSerializable
{
    /**
     * @param  Serializable  $data
     * @return Serializable
     */
    public function serialize(array $data): array;

    /**
     * @return Serializable
     */
    public function jsonSerialize(): array;
}
