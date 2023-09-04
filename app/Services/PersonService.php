<?php

namespace App\Services;

use App\Entity\Person;
use App\Repositories\Contracts\PdoPersonRepositoryInterface;
use Exception;

class PersonService
{
    private $repository;

    public function __construct(PdoPersonRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle()
    {
        return 'OK';
    }

    /**
     * @throws Exception
     */
    public function getPerson($nis): array | bool
    {
        try {
            return $this->repository->findBy('nis', $nis);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * @throws Exception
     */
    public function storePerson($data): array
    {
        $this->validate($data);

        try {
            $person = new Person();
            $person->setName($data['name']);
            $person->setNis($this->generateNis());

            $id = $this->repository->insert($person);
            return $this->repository->findBy('id', $id);

        }catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }

    private function generateNis(): int
    {
        $nis = strval(rand(10000000000, 99999999999));
        $person = $this->repository->findBy('nis', $nis);
        if ($person) {
            $this->generateNis();
        }
        return $nis;
    }

    private function validate($data): void
    {
        if (empty($data['name'])) {
            throw new Exception("Nome é obrigatório", 400);
        }
    }
}