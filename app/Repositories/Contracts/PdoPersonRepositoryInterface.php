<?php

namespace App\Repositories\Contracts;

use phpDocumentor\Reflection\Types\Mixed_;

interface PdoPersonRepositoryInterface
{
    public function insert($model);

    public function findBy(string $column, $value, array $fields = ['*']);
}