<?php

namespace Mpietrucha\Laravel\Filterable\Filter;

use Mpietrucha\Laravel\Filterable\Field;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Applicable;
use Mpietrucha\Laravel\Filterable\Filter\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Storage;
use Mpietrucha\Laravel\Package\Translations\Concerns\InteractsWithTranslations;

abstract class Preset extends Field implements FilterInterface
{
    use Applicable, InteractsWithTranslations;

    public function __construct()
    {
        $identifier = static::identify($this);

        $this->field(static::__("filter.$identifier"), $identifier, true);
    }

    public function handler(): mixed
    {
        return null;
    }

    public function jsonSerialize(): array
    {
        return [
            'dependant' => $this->dependant(),
            'identity' => Storage::store($this),
        ] |> parent::jsonSerialize(...);
    }
}
