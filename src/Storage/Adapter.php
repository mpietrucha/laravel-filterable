<?php

namespace Mpietrucha\Laravel\Filterable\Storage;

use Mpietrucha\Laravel\Filterable\Storage\Contracts\AdapterInterface;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Contracts\CreatableInterface;
use Mpietrucha\Utility\Filesystem;
use Mpietrucha\Utility\Filesystem\Temporary;
use Mpietrucha\Utility\Utilizer\Concerns\Utilizable;
use Mpietrucha\Utility\Utilizer\Contracts\UtilizableInterface;

class Adapter implements AdapterInterface, CreatableInterface, UtilizableInterface
{
    use Creatable, Utilizable\Strings;

    public function __construct(protected ?string $directory = null)
    {
    }

    public function get(string $identity): ?string
    {
        $file = $this->file($identity);

        return match (true) {
            Filesystem::exists($file) => Filesystem::get($file),
            default => null
        };
    }

    public function store(string $identity, string $value): void
    {
        Filesystem::put($this->file($identity), $value);
    }

    public function file(string $identity): string
    {
        return Temporary::get($identity, $this->directory());
    }

    protected function directory(): string
    {
        return $this->directory ??= static::utilize();
    }

    protected static function hydrate(): string
    {
        return Temporary::directory('filters');
    }
}
