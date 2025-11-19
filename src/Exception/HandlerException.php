<?php

namespace Mpietrucha\Laravel\Filterable\Exception;

use Mpietrucha\Utility\Throwable\RuntimeException;

class HandlerException extends RuntimeException
{
    public function configure(string $filter): string
    {
        return 'Handler `%s` not found';
    }
}
