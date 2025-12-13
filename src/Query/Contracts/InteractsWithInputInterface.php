<?php

namespace Mpietrucha\Laravel\Filterable\Query\Contracts;

interface InteractsWithInputInterface extends \Mpietrucha\Laravel\Filterable\Field\Contracts\InteractsWithInputInterface
{
    public function index(): int;
}
