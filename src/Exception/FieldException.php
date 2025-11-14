<?php

namespace Mpietrucha\Laravel\Filterable\Exception;

use Mpietrucha\Utility\Throwable\RuntimeException;

class FieldException extends RuntimeException
{
    public function configure(string $property): string
    {
        return 'Field `%s` is required';
    }
}
