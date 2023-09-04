<?php

namespace App\Repositories;

class PdoPersonRepository extends PdoRepository implements Contracts\PdoPersonRepositoryInterface
{
    protected $table = 'persons';

}