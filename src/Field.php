<?php

namespace Mpietrucha\Laravel\Filterable;

use Mpietrucha\Laravel\Filterable\Contracts\FieldInterface;
use Mpietrucha\Laravel\Filterable\Exception\FieldException;
use Mpietrucha\Utility\Arr;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Instance;
use Mpietrucha\Utility\Instance\Path;
use Mpietrucha\Utility\Str;
use Mpietrucha\Utility\Type;

abstract class Field implements FieldInterface
{
    use Creatable;

    protected ?string $name = null;

    protected ?string $attribute = null;

    public static function identify(object|string $input): string
    {
        $identifier = match (true) {
            Type::object($input) => Instance::namespace($input),
            default => $input
        } |> Path::name(...);

        return match (true) {
            Str::upper($identifier) === $identifier => Str::lower($identifier),
            default => $identifier
        } |> Str::snake(...);
    }

    public function field(string $name, ?string $attribute = null, bool $hydrate = false): static
    {
        $this->name = $name;

        $this->attribute = $attribute ?? static::identify($name);

        return match (true) {
            $hydrate => $this->field($this->name(), $this->attribute()),
            default => $this
        };
    }

    public function name(): string
    {
        return $this->name ?? FieldException::for(__FUNCTION__)->throw();
    }

    public function attribute(): string
    {
        return $this->attribute ?? FieldException::for(__FUNCTION__)->throw();
    }

    public function jsonSerialize(): array
    {
        $previous = func_get_args() |> Arr::collapse(...);

        return [
            'name' => $this->name(),
            'attribute' => $this->attribute(),
        ] + $previous;
    }
}
